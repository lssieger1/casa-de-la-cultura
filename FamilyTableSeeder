class FamilyTableSeeder extends Seeder {

    public function run()
    {
        DB::table('family')->delete();

        DB::table('family')->insert(array(
        array('relation'=> 'Mother'),
        array('relation'=> 'Father'),
        array('relation'=> 'Brother'),
        array('relation'=> 'Sister'),
        array('relation'=> 'Grandmother'),
        array('relation'=> 'Grandfather'),
        array('relation'=> 'Grandson'),
        array('relation'=> 'Granddaughter'),
        array('relation'=> 'Uncle'),
        array('relation'=> 'Aunt'),
        array('relation'=> 'Nephew'),
        array('relation'=> 'Niece'),
        array('relation'=> 'Cousin'))
        );
    }
}
