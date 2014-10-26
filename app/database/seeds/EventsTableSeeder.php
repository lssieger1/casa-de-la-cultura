<?php
class EventsTableSeeder extends Seeder {

 public function run()
    {
        DB::table('events')->delete();

        DB::table('events')->insert(array(
         array('type_id'=>1, 'name' => 'swimming','date'=> '20140531', 'description' => 'Play Soccer'),
         array('type_id'=>1, 'name' => 'soccer','date'=> '20140613', 'description' => 'Play Soccer Again'),
         array('type_id'=>3, 'name' => 'English','date'=> '20140614', 'description' => 'Come swimming'),
         array('type_id'=>4, 'name' => 'swimming','date'=> '20140629', 'description' => 'Take Pictures'),
         array('type_id'=>2, 'name' => 'soccer','date'=> '20140708', 'description' => 'Learn to speak English')
         ));
         
    }
    
}
