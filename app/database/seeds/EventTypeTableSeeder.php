<?php
class EventTypeTableSeeder extends Seeder {

    public function run()
    {
        DB::table('eventtype')->delete();
        
        DB::table('eventtype')->insert(array(
            array('type_name'=>'Soccer'),
            array('type_name'=>'English Class'),
            array('type_name'=>'Swimming'),
            array('type_name'=>'Photography'),
            array('type_name'=>'Heritage Day')
        )) ;
    }
}
?>