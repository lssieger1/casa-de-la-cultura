<?php
class EventTypeTableSeeder extends Seeder {

    public function run()
    {
        DB::table('eventType')->delete();
        
        DB::table('eventType')->insert(array(
         array('type_id'=> 1,'type_name'=>'Soccer'),
         array('type_id'=> 2,'type_name'=>'English Class'),
         array('type_id'=> 3,'type_name'=>'Swimming'),
         array('type_id'=> 4,'type_name'=>'Photography'),
         array('type_id'=> 5,'type_name'=>'Heritage Day')
         )) ;
    }
}
