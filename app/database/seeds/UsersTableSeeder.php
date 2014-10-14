<?php
class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert(array(
         array('username'=> 'billybob','email'=>'bbob@vblues.com', 'name' => 'Billybob', 
            'password' => Hash::make('test'), 'password_temp' => Hash::make('test'), 
            'phoneNo' => '5559876543',
            'user_type' => 1, 
            'securityQue' => 'What is your favorite vacation spot?', 
            'securityAns' => Hash::make('Hawaii'),
            'remember_token' => 'yes'),
         array('username'=> 'felsey','email'=>'felzy@edrinks.com', 'name' => 'Cammy Felzy', 
            'password' => Hash::make('test1'), 'password_temp' => Hash::make('test1'), 
            'phoneNo' => '5559276543',
            'user_type' => 2, 
            'securityQue' => 'What is your favorite vacation spot?', 
            'securityAns' => Hash::make('Boston'),
            'remember_token' => 'yes'),
         array('username'=> 'jbre','email'=>'jb@dex.com', 'name' => 'Jack', 
            'password' => Hash::make('test2'), 'password_temp' => Hash::make('test2'), 
            'phoneNo' => '5554326543',
            'user_type' => 1, 
            'securityQue' => 'What is your favorite vacation spot?', 
            'securityAns' => Hash::make('Ibiza'),
            'remember_token' => 'yes'),
         array('username'=> 'blanca','email'=>'blanca@clean.com', 'name' => 'blancaClean', 
            'password' => Hash::make('test'), 'password_temp' => Hash::make('test'), 'phoneNo' => '2358932018',
            'user_type' => 2, 'securityQue' => 'What is your favorite vacation spot?', 'securityAns' => Hash::make('Gettysburg'),
            'remember_token' => 'yes')  
            ));    
    }
        
}
