<?php
class EventTypeTableSeeder extends Seeder {

    public function run()
    {
        DB::table('eventType')->delete();
        
        DB::table('eventType')->insert(array(
         array('type_name'=>'Soccer'),
         array('type_name'=>'English Class'),
         array('type_name'=>'Swimming'),
         array('type_name'=>'Photography'),
         array('type_name'=>'Heritage Day')
         )) ;
    }
}
