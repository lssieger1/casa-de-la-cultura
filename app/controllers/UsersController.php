<?php 
	class UsersController extends BaseController {

		//constructor
		public function __construct(User $user){
			$this->user = $user;
		}

		public function index() {
			$users = User::all();
			return View::make('admin/browseAllUsers', ['users'=>$users]);

		}

	    public function store(){
	    	$user = new User;
	    	$user->username = Input::get('username');
	    	$user->email = Input::get('email');
	    	$user->name = Input::get('name');
	    	if(Input::get('password') === Input::get('verifyPassword')){
	    		$user->password = Hash::make(Input::get('password'));
	    		
	    	}
	    	else{

	    		return Redirect::back()->withInput(); 
	    	}
	    	$user->phoneNo = Input::get('phoneNo');
	    	$user->user_type = Input::get('userType')+1;

	    	$user->save();
	    	Session::flash('message', 'User created');
	    	return Redirect::to('events')->with('message','User created successfully');
	    }

		public function runQuery(){

			$built_query = [];
			$query = ['date','location','fname','lname','mname','nationality','language','address','city','state'];
			$fields = Input::get('fields');
			for($i = 0; $i < count($fields); $i++){
				if($fields[$i] != ''){
					$built_query[''.$query[$i].''] = ''.$query[$i].' LIKE  "'.$fields[$i].'" ';
				}

			}
			$type_id = Input::get('eventType');
			if($type_id != 0){
				$built_query['type_id'] = 'attendance.type_id = "'.$type_id.'"';
			}
			$gender = Input::get('gender');
			if($gender == 1){
				$built_query['gender'] = 'gender LIKE  "Male" ';
			}
			elseif ($gender == 2) {
				$built_query['gender'] = 'gender LIKE  "Female" ';
			}elseif ($gender == 3) {
				$built_query['gender'] = 'gender LIKE  "Other" ';
			}

			$age = Input::get('age');
			if($age == 1){
				$built_query['age'] = 'YEAR(CURDATE())-YEAR(dob) BETWEEN 0 AND 12';
			}elseif($age ==2){
				$built_query['age'] = 'YEAR(CURDATE())-YEAR(dob) BETWEEN 13 AND 18';
			}elseif($age == 3){
				$built_query['age'] = 'YEAR(CURDATE())-YEAR(dob) BETWEEN 19 AND 21';
			}elseif($age == 4){
				$built_query['age'] = 'YEAR(CURDATE())-YEAR(dob) > 21';
			}
				
			 //select fields
			 $a = array();
			 $showFields = array();	
			 $selectedFields = Input::get('cb');
			 foreach($selectedFields as $selectedField) {
    			list($p,$q) = explode("/",$selectedField);
    			$a[] = $p;
    			$showFields[] =$q;   			
			}
			$queryFields = implode(" , ", $a);

			if($type_id == 0 and $age == 0 and count($built_query) == 0 and $gender == 0){
				 $results = DB::table('participants')
				 						->join('attendance','participants.part_id','=','attendance.part_id')
				 						->join('events','attendance.event_id','=','events.event_id')
				 						->distinct()
				 						->get();
			}
			else{
				$built_query = implode(" AND ", $built_query);
				$results = DB::select(DB::raw("SELECT DISTINCT $queryFields FROM participants,attendance,events 
				 	WHERE participants.part_id = attendance.part_id AND attendance.event_id = events.event_id AND
				 	$built_query"));
			}
			return View::make('admin/showResults',['results'=> $results, 'a'=>$a, 'showFields' => $showFields]);
		}

		public function editUser($user_id){
			$user = findOrFail($user_id);
			return View::make('admin/updateUserInformation',['user'=> $user]);
		}

		public function updateUser($user_id){
			$user = User::findOrFail($user_id);

			$user->username = Input::get('username');
			$user->email = Input::get('email');
			$user->name = Input::get('name');
			$user->phoneNo = Input::get('phoneNo');
			$user->user_type = Input::get('userType');

			$user->save();

			return Redirect::to('browseAllUsers');
		}


		public function changePassword() {
			$id = Auth::id();
			$user = User::findOrFail($id);
			$pword = Input::get('currPassword');
			$oldPword = Auth::user()->password;

			if(Hash::check($pword, $oldPword)){
				$newPword = Input::get('password');
				$confPword = Input::get('verifyPassword');
				if($newPword === $confPword){
					$user->password = Hash::make($newPword);
					
					$user->save();
					return Redirect::to('events');
				}
				return Redirect::back()->withErrors('New passwords do not match');
			}
			return Redirect::back()->withErrors('Current password does not match existing password');
		}

		public function editPassword($user_id){
			$user = User::findOrFail($user_id);
			return View::make('admin/resetPassword', ['user' => $user]);
		}
		public function resetPassword($user_id) {
			$user = User::findOrFail($user_id);
			$newPword = Input::get('password');
			$verPword = Input::get('verifyPassword');
			if($newPword === $verPword){

				$user->password = Hash::make($newPword);
				$user->save();
				return Redirect::to('browseAllUsers');
			}
			return Redirect::back()->withErrors('Passwords do not match');
		}

		public function destroy($user_id){
			$user = User::findOrFail($user_id);
			$user->delete();
			return Redirect::back();
		}

	}