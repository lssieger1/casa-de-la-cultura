<?php
class ParticipantsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('participants')->delete();
        
        DB::table('participants')->insert(array(
        array('part_id'=> 1, 'fname' => 'Tim', 'mname'=> 'Bud', 'lname'=>'Allen', 'dob'=>'1959-06-23',
         'nationality'=> 'Merican', 'native_lang'=>'Merican', 'other_lang'=>'Spanish', 
         'phoneNo'=>'5552348976', 'email'=>'toolMan@toolTime.com'),
        array('part_id'=> 2, 'fname' => 'Penelope', 'mname'=> 'Beautiful', 'lname'=>'Cruz', 'dob'=>'19740220', 
         'nationality'=> 'Spanish', 'native_lang'=>'Spanish', 'other_lang'=>'English', 
         'phoneNo'=>'5558562635', 'email'=>'sexiest@esquire.com'),
        array('part_id'=> 3,'fname' => 'Luis', 'mname'=> 'Evander', 'lname'=>'Suarez', 'dob'=>'19740131', 
         'nationality'=> 'Argentinian', 'native_lang'=>'Spanish', 'other_lang'=>'English', 
         'phoneNo'=>'5558622031', 'email'=>'BiteYaEar@bowToTyson.com'),
        array('part_id'=> 4,'fname' => 'Sun', 'mname'=> 'Sen', 'lname'=>'Yatsen', 'dob'=>'19740601', 
         'nationality'=> 'Chinese', 'native_lang'=>'Chinese', 'other_lang'=>'English', 
         'phoneNo'=>'5552930847', 'email'=>'greatWarrior@loseBattles.com'),
        array('part_id'=> 5,'fname' => 'Bar', 'mname'=> '', 'lname'=>'Rafaeli', 'dob'=>'19740220', 
         'nationality'=> 'Israeli', 'native_lang'=>'Hebrew', 'other_lang'=>'English', 
         'phoneNo'=>'5558106324', 'email'=>'2hot@si.com') 
         ));
         
    }
    
}
