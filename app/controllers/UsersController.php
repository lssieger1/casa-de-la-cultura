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

				$results = DB::select( DB::raw("SELECT * FROM eventtype WHERE type_name = :eventType"), array(
  				 'eventType' => $eventType));

				return $results;//View::make('admin/showResults',['results'=> $results]);
			}

		}