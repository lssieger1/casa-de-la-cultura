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
	    	$input = Input::all();
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
	    	return Redirect::to('events')->with('message','User created succesfully');
	    }

		public function runQuery(){

			$built_query = [];
			$eventType = Input::get("eventType");
			$date = Input::get("date");
			$location = Input::get("location");
			$gender = Input::get("gender");
			$fname = Input::get("firstName");
			$lname = Input::get("lastName");
			$mname = Input::get("middleName");
			$dob = Input::get("dob");
			$nationality = Input::get("nationality");
			$language = Input::get("language");
			$address = Input::get("address");
			$email = Input::get("email");
			$city = Input::get("city");
			$state = Input::get("state");

			if($eventType != 0){
				$built_query['eventType'] = 'attendance.type_id =  '.$eventType.' ';
			}

			if($date != ''){				
				$built_query['date'] = 'date LIKE  "'.$date.'" ';
			}
			
			if($location != ''){
				$built_query['location'] = 'location LIKE  "'.$location.'" ';
			}		

			if($gender == 1){
				$built_query['gender'] = 'gender LIKE  "Male" ';
			}
			elseif ($gender == 2) {
				$built_query['gender'] = 'gender LIKE  "Female" ';
			}elseif ($gender == 3) {
				$built_query['gender'] = 'gender LIKE  "Other" ';
			}

			if($fname != ''){
				$built_query['fname'] = 'fname LIKE  "'.$fname.'" ';
			}
		
			if($lname !=''){
				$built_query['lname'] = 'lname LIKE "'.$lname.'" ';
			}

			if($mname !=''){
				$built_query['mname'] = 'mname LIKE "'.$mname.'" ';
			}

			if($dob !=''){			
				$built_query['dob'] = 'dob LIKE "'.$dob.'" ';
			}

			if($nationality !=''){
				$built_query['nationality'] = 'nationality LIKE "'.$nationality.'" ';
			}

			if($language !=''){
				 $built_query['language'] = 'native_lang LIKE "'.$language.'" ';
			}

			if($address !=''){
				$built_query['address'] = 'address LIKE "'.$address.'" ';
			}
			if($city !=''){
				
				$built_query['city'] = 'city LIKE "'.$city.'" ';
			}
			if($state !=''){
				
				$built_query['state'] = 'state LIKE "'.$state.'" ';
			}
			if($email != ''){
				$built_query['email'] = 'email LIKE "'.$email.'" ';
			}

			 $built_query = implode(" AND ", $built_query);

		     //select fields
		     $selectedField = [];
			 $a = array();
			 $showFields = array();
				 if (Input::get('dateCB') === 'dateCB') {
					   $selectedField['date'] = 'date';
					   $a[] = 'date';
					   $showFields[] = 'Date';
				 }
				 if (Input::get('locationCB') === 'locationCB') {
					   $selectedField['location'] = 'location';
					   $a[] = 'location';
					   $showFields[] = 'Location';
				 }
				 if (Input::get('genderCB') === 'genderCB') {
					   $selectedField['gender'] = 'gender';
					   $a[] = 'gender';
					   $showFields[] = 'Gender';
				 }
				 if (Input::get('firstNameCB') === 'firstNameCB') {
					   $selectedField['fname'] = 'fname';
					   $a[] = 'fname';
					   $showFields[] = 'First Name';
				 }
				 if (Input::get('middleNameCB') === 'middleNameCB') {
					   $selectedField['mname'] = 'mname';
					   $a[] = 'mname';
					   $showFields[] = 'Middle Name';
				 }
				 if (Input::get('lastNameCB') === 'lastNameCB') {
					   $selectedField['lname'] = 'lname';
					   $a[] = 'lname';
					   $showFields[] = 'Last Name';
				 }
				 if (Input::get('dobCB') === 'dobCB') {
					   $selectedField['dob'] = 'dob';
					   $a[] = 'dob';
					   $showFields[] = 'Date of Birth';
				 }
				 if (Input::get('nationalityCB') === 'nationalityCB') {
					   $selectedField['nationality'] = 'nationality';
					   $a[] = 'nationality';
					   $showFields[] = 'Nationality';
				 }
				 if (Input::get('languageCB') === 'languageCB') {
					   $selectedField['native_lang'] = 'native_lang';
					   $a[] = 'native_lang';
					   $showFields[] = 'Native Language';
				 }
				 if (Input::get('addressCB') === 'addressCB') {
					   $selectedField['address'] = 'address';
					   $a[] = 'address';
					   $showFields[] = 'Address';
				 }

				 if($eventType == null and $date == null and $location == null and $gender == null and $fname == null
				 	and $mname == null and $lname == null and $dob == null and $nationality == null and $language == null
				 	and $address == null){
				 	$results = DB::table('participants')
				 						->join('attendance','participants.part_id','=','attendance.part_id')
				 						->join('events','attendance.event_id','=','events.event_id')
				 						->distinct()
				 						->get();
				 }
				 else{
				 $selectedField = implode(" , ", $selectedField);

				 $results = DB::select(DB::raw("SELECT DISTINCT $selectedField FROM participants,attendance,events 
				 	WHERE participants.part_id = attendance.part_id AND attendance.event_id = events.event_id AND
				 	$built_query"));
				}
			return  View::make('admin/showResults',['results'=> $results, 'a'=>$a, 'showFields' => $showFields]);
		}

		public function editUser($user_id){
			$user = findOrFail($user_id);
			return View::make('admin/updateUserInformation',['user'=> $user]);
		}

		public function updateUser($user_id){

			$input = Input::all();
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

	}
	// public function exportExcel(){
	// Excel::create('Filename', function($excel) {

	// })->export('xls');
	//}

?>