<?php

use Illuminate\Database\Seeder;
use App\NParroquia;

class NParroquiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('nombre'=>'Chiguará'),
            array('nombre'=>'Estánquez'),
            array('nombre'=>'Lagunillas'),
            array('nombre'=>'La Trampa'),
            array('nombre'=>'Pueblo Nuevo del Sur'),
            array('nombre'=>'San Juan'),
        );
        
        NParroquia::insert($data);
    }
}
