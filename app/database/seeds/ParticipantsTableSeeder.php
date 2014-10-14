<?php
class ParticipantsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('participants')->delete();
        
        DB::table('participants')->insert(array(
        array('fname' => 'Tim', 'mname'=> 'Bud', 'lname'=>'Allen', 'dob'=>'06231959', 'pob'=>'Detroit',
         'nationality'=> 'Merican', 'native_lang'=>'Merican', 'other_lang'=>'Spanish', 'householdID'=>'2',
         'phoneNo'=>'5552348976', 'email'=>'toolMan@toolTime.com', 'schoolDistrict'=>'Gettysburg'),
        array('fname' => 'Penelope', 'mname'=> 'Beautiful', 'lname'=>'Cruz', 'dob'=>'03121974', 'pob'=>'Spain',
         'nationality'=> 'Spanish', 'native_lang'=>'Spanish', 'other_lang'=>'English', 'householdID'=>'1',
         'phoneNo'=>'5558562635', 'email'=>'sexiest@esquire.com', 'schoolDistrict'=>'Adams County'),
        array('fname' => 'Luis', 'mname'=> 'Evander', 'lname'=>'Suarez', 'dob'=>'10021983', 'pob'=>'Argentina',
         'nationality'=> 'Argentinian', 'native_lang'=>'Spanish', 'other_lang'=>'English', 'householdID'=>'4',
         'phoneNo'=>'5558622031', 'email'=>'BiteYaEar@bowToTyson.com', 'schoolDistrict'=>'Biglersville'),
        array('fname' => 'Sun', 'mname'=> 'Sen', 'lname'=>'Yatsen', 'dob'=>'06231603', 'pob'=>'China',
         'nationality'=> 'Chinese', 'native_lang'=>'Chinese', 'other_lang'=>'English', 'householdID'=>'3',
         'phoneNo'=>'5552930847', 'email'=>'greatWarrior@loseBattles.com', 'schoolDistrict'=>'Hanover'),
        array('fname' => 'Bar', 'mname'=> '', 'lname'=>'Rafaeli', 'dob'=>'02111983', 'pob'=>'Israel',
         'nationality'=> 'Israeli', 'native_lang'=>'Hebrew', 'other_lang'=>'English', 'householdID'=>'2',
         'phoneNo'=>'5558106324', 'email'=>'2hot@si.com', 'schoolDistrict'=>'Mummasburg') 
         ));
         
    }
    
}
