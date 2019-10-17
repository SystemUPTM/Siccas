<?php

use Illuminate\Database\Seeder;
use App\NPreguntaRecuperacion;

class NPreguntasRecuperacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('pregunta'=>'¿Cuál es el nombre de la mascota favorita?'),
            array('pregunta'=>'¿Cuál es su color favorito?'),
            array('pregunta'=>'¿Cual es la profesión de su padre?'),
            array('pregunta'=>'¿Cual es la profesión de su madre?'),
            array('pregunta'=>'¿Cual es el lugar de nacimiento de su abuela?'),
            array('pregunta'=>'¿Cual es el nombre de su profesor favorito?'),
            array('pregunta'=>'¿Cual es el nombre del equipo de futbol favorito de su padre?'),
        );
        
        NPreguntaRecuperacion::insert($data);
    }
}
