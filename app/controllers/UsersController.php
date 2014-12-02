	<?php 
		class UsersController extends BaseController {

			//constructor
			public function __construct(User $user){
				$this->user = $user;
			}


			public function show(){
				if(Auth::check()){
					$id = Auth::user()->id;
					//$currentUser = User::get($id);
					if(Auth::user()->type ===1){
						return View::make('public/admin');
					}
				//$user = User::find($id);
					return View::make('volunteer/attendance');
					}
				else{
					return 'log in!';
				}
				//return View::make('public/admin',['currentUser'=> $currentUser]);
			}

			public function runQuery(){

				$eventType = Input::get("eventType");
				$date = Input::get("date");
				$location = Input::get("location");

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
				if(Input::get("email") !=''){
					$email = Input::get("email");
				}else{
					$email = null;
				}
				//run query
 				$result = DB::select(DB::raw("SELECT * FROM participants WHERE fname = :fname
					AND mname = :mname AND lname = :lname AND dob = :dob AND nationality = :nationality
					AND native_lang =:language AND address = :address AND email = :email"),
 					array('fname' => $fname, 'mname' => $mname,
					 	'lname' => $lname, 'dob' => $dob,'nationality' => $nationality,'language' => $language, 'address' => $address,
					 	'email' => $email));

 				    //$results = DB::select(DB::raw("SELECT * FROM participants WHERE fname = :fname AND lname = null"),
 					//array('fname' => $fname));
 					 $built_query = [];
					 is_null($fname) ? null : $built_query['fname'] = 'fname LIKE  "'.$fname.'" ';
					 is_null($lname) ? null : $built_query['lname'] = 'lname LIKE "'.$lname.'" ';
					 is_null($mname) ? null : $built_query['mname'] = 'mname LIKE "'.$mname.'" ';
					 is_null($dob) ? null : $built_query['dob'] = 'dob LIKE "'.$dob.'" ';
					 is_null($nationality) ? null : $built_query['nationality'] = 'nationality LIKE "'.$nationality.'" ';
					 is_null($language) ? null : $built_query['language'] = 'native_lang LIKE "'.$language.'" ';
					 is_null($address) ? null : $built_query['address'] = 'address LIKE "'.$address.'" ';
					 is_null($lname) ? null : $built_query['email'] = 'email LIKE "'.$email.'" ';
					 $built_query = implode(" AND ", $built_query);
					 $results = DB::select(DB::raw("SELECT * FROM participants WHERE $built_query"));


				return  View::make('admin/showResults',['results'=> $results]);
			}

		}