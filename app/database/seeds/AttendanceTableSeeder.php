<?php class AttendanceTableSeeder extends Seeder {

    public function run()
    {
        DB::table('attendance')->delete();

        DB::table('attendance')->insert(array(
         array('event_id'=>1,'part_id'=> 1, 'type_id' => 1),
             array('event_id'=>1,'part_id'=> 2, 'type_id' => 1),
             array('event_id'=>3,'part_id'=> 3, 'type_id' => 3),
             array('event_id'=>5,'part_id'=> 4, 'type_id' => 2),
             array('event_id'=>5,'part_id'=> 1, 'type_id' => 2)

          ));
    }

}
