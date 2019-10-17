<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use App\NTipoTrimestre;

class NTipoTrimestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('nombre'=>'Primer Trimestre'),
            array('nombre'=>'Segundo Trimestre'),
            array('nombre'=>'Tercer Trimestre'),
            array('nombre'=>'Cuarto Trimestre'),
        );
        
        NTipoTrimestre::insert($data);
    }
}
