<?php 
	class UsersController extends BaseController {

		//constructor
		public function __construct(User $user){
			$this->user = $user;
		}

	    public function store(){
	    	$input = Input::all();
	    	$user = new User;
	    	$user->username = Input::get('username');
	    	$user->email = Input::get('email');
	    	$user->name = Input::get('name');
	    	if(Input::get('password') === Input::get('verifyPassword')){
	    		$user->password = Input::get('password');
	    	}
	    	else{

	    		return Redirect::back()->withInput(); 
	    	}
	    	$user->phoneNo = Input::get('phoneNo');
	    	$user->user_type = Input::get('userType')+1;

	    	$user->save();
	    	Session::flash('message', 'User created');
	    	return Redirect::to('/events')->with('message','User created succesfully');
	    }

		public function runQuery(){

			if(Input::get("eventType") != 0){
				$eventType = Input::get("eventType");
			}else{$eventType = null;}

			if(Input::get("date") != ''){
				$date = Input::get("date");
			}else{$date = null;}
			
			if(Input::get("location") != ''){
				$location = Input::get("location");
			}else{$location = null;}				

			if(Input::get("gender") == 1){
				$gender = "Male";
			}
			elseif (Input::get("gender") == 2) {
				$gender = "Female";
			}elseif (Input::get("gender") == 3) {
				$gender = "Other";
			}else {$gender = null;}

			if(Input::get("firstName") != ''){
				$fname = Input::get("firstName");
			}else{$fname = null;}
		
			if(Input::get("lastName") !=''){
				$lname = Input::get("lastName");
			}else{$lname = null;}

			if(Input::get("middleName") !=''){
				$mname = Input::get("middleName",null);
			}else{
				$mname = null;
			}

			if(Input::get("dob") !=''){
				$dob = Input::get("dob");
			}else{
				$dob = null;
			}

			if(Input::get("nationality") !=''){
				$nationality = Input::get("nationality");
			}else{
				$nationality = null;
			}

			if(Input::get("language") !=''){
				$language = Input::get("language");
			}else{
				$language = null;
			}

			if(Input::get("address") !=''){
				$address = Input::get("address");
			}else{
				$address = null;
			}
			//$city = Input::get("city");
			//$state = Input::get("state");
			if(Input::get("email") != ''){
				$email = Input::get("email");
			}else{
				$email = null;
			}
			//run query
			 $built_query = [];
			 is_null($eventType) ? null : $built_query['eventType'] = 'attendance.type_id =  '.$eventType.' ';
			 is_null($date) ? null : $built_query['date'] = 'date LIKE  "'.$date.'" ';
			 is_null($location) ? null : $built_query['location'] = 'location LIKE  "'.$location.'" ';
			 is_null($gender) ? null : $built_query['gender'] = 'gender LIKE  "'.$gender.'" ';
			 is_null($fname) ? null : $built_query['fname'] = 'fname LIKE  "'.$fname.'" ';
			 is_null($lname) ? null : $built_query['lname'] = 'lname LIKE "'.$lname.'" ';
			 is_null($mname) ? null : $built_query['mname'] = 'mname LIKE "'.$mname.'" ';
			 is_null($dob) ? null : $built_query['dob'] = 'dob LIKE "'.$dob.'" ';
			 is_null($nationality) ? null : $built_query['nationality'] = 'nationality LIKE "'.$nationality.'" ';
			 is_null($language) ? null : $built_query['language'] = 'native_lang LIKE "'.$language.'" ';
			 is_null($address) ? null : $built_query['address'] = 'address LIKE "'.$address.'" ';
			 is_null($email) ? null : $built_query['email'] = 'email LIKE "'.$email.'" ';
			 $built_query = implode(" AND ", $built_query);

				 //select fields
		     $selectedField = [];
			 $a = array();
				 if (Input::get('dateCB') === 'dateCB') {
					   $selectedField['date'] = 'date';
					   $a[] = 'date';
				 }
				 if (Input::get('locationCB') === 'locationCB') {
					   $selectedField['location'] = 'location';
					   $a[] = 'location';
				 }
				 if (Input::get('genderCB') === 'genderCB') {
					   $selectedField['gender'] = 'gender';
					   $a[] = 'gender';
				 }
				 if (Input::get('firstNameCB') === 'firstNameCB') {
					   $selectedField['fname'] = 'fname';
					   $a[] = 'fname';
				 }
				 if (Input::get('middleNameCB') === 'middleNameCB') {
					   $selectedField['mname'] = 'mname';
					   $a[] = 'mname';
				 }
				 if (Input::get('lastNameCB') === 'lastNameCB') {
					   $selectedField['lname'] = 'lname';
					   $a[] = 'lname';
				 }
				 if (Input::get('dobCB') === 'dobCB') {
					   $selectedField['dob'] = 'dob';
					   $a[] = 'dob';
				 }
				 if (Input::get('nationality') === 'nationality') {
					   $selectedField['nationality'] = 'nationality';
					   $a[] = 'nationality';
				 }
				 if (Input::get('languageCB') === 'languageCB') {
					   $selectedField['native_lang'] = 'native_lang';
					   $a[] = 'native_lang';
				 }
				 if (Input::get('addressCB') === 'addressCB') {
					   $selectedField['address'] = 'address';
					   $a[] = 'address';
				 }


				 $selectedField = implode(" , ", $selectedField);

				 $results = DB::select(DB::raw("SELECT DISTINCT $selectedField FROM participants,attendance,events 
				 	WHERE participants.part_id = attendance.part_id AND attendance.event_id = events.event_id AND
				 	$built_query"));

			return  View::make('admin/showResults',['results'=> $results, 'a'=>$a]);
		}
	}
	// public function exportExcel(){
	// Excel::create('Filename', function($excel) {

	// })->export('xls');
	//}

?>