<?php

use Illuminate\Database\Seeder;
use App\NSector;

class NSectoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            // Chigurará
            array('nombre'=>'Caserío El Anís', 'parroquia_id'=>1),
            array('nombre'=>'Caserío El Tejar', 'parroquia_id'=>1),
            array('nombre'=>'Caserío La Playita', 'parroquia_id'=>1),
            array('nombre'=>'Caserío Los Rurales', 'parroquia_id'=>1),
            array('nombre'=>'Caserío Pueblo Nuevo', 'parroquia_id'=>1),
            array('nombre'=>'Caserío Ricaute', 'parroquia_id'=>1),
            array('nombre'=>'Caserío San Antonio', 'parroquia_id'=>1),
            array('nombre'=>'Centro Chiguará', 'parroquia_id'=>1),
            array('nombre'=>'Sector El Cacique', 'parroquia_id'=>1),
            array('nombre'=>'Sector El Filo', 'parroquia_id'=>1),
            array('nombre'=>'Sector El Verde', 'parroquia_id'=>1),
            array('nombre'=>'Sector Montoya', 'parroquia_id'=>1),
            array('nombre'=>'Sector San Juanito', 'parroquia_id'=>1),
            // Estánquez
            array('nombre'=>'Centro Estánquez', 'parroquia_id'=>2),
            array('nombre'=>'Sector El Hato', 'parroquia_id'=>2),
            array('nombre'=>'Sector El Joque', 'parroquia_id'=>2),
            array('nombre'=>'Sector Las Labranzas', 'parroquia_id'=>2),
            array('nombre'=>'Sector Mocochopo', 'parroquia_id'=>2),
            array('nombre'=>'Sector Quirorá', 'parroquia_id'=>2),
            array('nombre'=>'Sector San Antonio', 'parroquia_id'=>2),
            array('nombre'=>'Sector San Pablo', 'parroquia_id'=>2),
            array('nombre'=>'Sector San Pablo Arriba', 'parroquia_id'=>2),
            // Lagunillas
            array('nombre'=>'Barrio San Miguel', 'parroquia_id'=>3),
            array('nombre'=>'Caserío Los Uvitos', 'parroquia_id'=>3),
            array('nombre'=>'Centro Lagunillas', 'parroquia_id'=>3),
            array('nombre'=>'Conjunto Residencial Urao', 'parroquia_id'=>3),
            array('nombre'=>'Sector Agua de Urao', 'parroquia_id'=>3),
            array('nombre'=>'Sector Belén', 'parroquia_id'=>3),
            array('nombre'=>'Sector Callejón de la Viejas', 'parroquia_id'=>3),
            array('nombre'=>'Sector Casa Bonita', 'parroquia_id'=>3),
            array('nombre'=>'Sector Casas', 'parroquia_id'=>3),
            array('nombre'=>'Sector El Molino', 'parroquia_id'=>3),
            array('nombre'=>'Sector La Alegría', 'parroquia_id'=>3),
            array('nombre'=>'Sector La Calera', 'parroquia_id'=>3),
            array('nombre'=>'Sector La Huerta', 'parroquia_id'=>3),
            array('nombre'=>'Sector La Joya', 'parroquia_id'=>3),
            array('nombre'=>'Sector La Trinchera', 'parroquia_id'=>3),
            array('nombre'=>'Sector Llano Seco', 'parroquia_id'=>3),
            array('nombre'=>'Sector Loma de Piedra', 'parroquia_id'=>3),
            array('nombre'=>'Sector Los Araques', 'parroquia_id'=>3),
            array('nombre'=>'Sector Los Azules', 'parroquia_id'=>3),
            array('nombre'=>'Sector Los Curos', 'parroquia_id'=>3),
            array('nombre'=>'Sector Los Llanitos', 'parroquia_id'=>3),
            array('nombre'=>'sector Mucumbú', 'parroquia_id'=>3),
            array('nombre'=>'Sector Pueblo Nuevo', 'parroquia_id'=>3),
            array('nombre'=>'Sector Pueblo Viejo', 'parroquia_id'=>3),
            array('nombre'=>'Sector Quinanoque', 'parroquia_id'=>3),
            array('nombre'=>'Sector San Benito', 'parroquia_id'=>3),
            array('nombre'=>'Sector San Juan', 'parroquia_id'=>3),
            // Lagunillas
            array('nombre'=>'Barrio San Miguel', 'parroquia_id'=>3),
            array('nombre'=>'Caserío Los Uvitos', 'parroquia_id'=>3),
            array('nombre'=>'Centro Lagunillas', 'parroquia_id'=>3),
            array('nombre'=>'Conjunto Residencial Urao', 'parroquia_id'=>3),
            array('nombre'=>'Sector Agua de Urao', 'parroquia_id'=>3),
            array('nombre'=>'Sector Belén', 'parroquia_id'=>3),
            array('nombre'=>'Sector Callejón de la Viejas', 'parroquia_id'=>3),
            array('nombre'=>'Sector Casa Bonita', 'parroquia_id'=>3),
            array('nombre'=>'Sector Casas', 'parroquia_id'=>3),
            array('nombre'=>'Sector El Molino', 'parroquia_id'=>3),
            array('nombre'=>'Sector La Alegría', 'parroquia_id'=>3),
            array('nombre'=>'Sector La Calera', 'parroquia_id'=>3),
            array('nombre'=>'Sector La Huerta', 'parroquia_id'=>3),
            array('nombre'=>'Sector La Trinchera', 'parroquia_id'=>3),
            array('nombre'=>'Sector Llano Seco', 'parroquia_id'=>3),
            array('nombre'=>'Sector Loma de Piedra', 'parroquia_id'=>3),
            array('nombre'=>'Sector Los Araques', 'parroquia_id'=>3),
            array('nombre'=>'Sector Los Azules', 'parroquia_id'=>3),
            array('nombre'=>'Sector Los Curos', 'parroquia_id'=>3),
            array('nombre'=>'Sector Los Llanitos', 'parroquia_id'=>3),
            array('nombre'=>'sector Mucumbú', 'parroquia_id'=>3),
            array('nombre'=>'Sector Pueblo Nuevo', 'parroquia_id'=>3),
            array('nombre'=>'Sector Pueblo Viejo', 'parroquia_id'=>3),
            array('nombre'=>'Sector Quinanoque', 'parroquia_id'=>3),
            array('nombre'=>'Sector San Benito', 'parroquia_id'=>3),
            array('nombre'=>'Sector San Juan', 'parroquia_id'=>3),
            array('nombre'=>'Sector San Martín', 'parroquia_id'=>3),
            // La Trampa
            array('nombre'=>'Centro La Trampa', 'parroquia_id'=>4),
            array('nombre'=>'Sector El Cacique', 'parroquia_id'=>4),
            array('nombre'=>'Sector El Cambur', 'parroquia_id'=>4),
            array('nombre'=>'Sector La Sabana', 'parroquia_id'=>4),
            // Pueblo Nuevo del Sur
            array('nombre'=>'Centro Pueblo Nuevo del Sur', 'parroquia_id'=>5),
            array('nombre'=>'Sector El Cambur', 'parroquia_id'=>5),
            array('nombre'=>'Sector El Hático', 'parroquia_id'=>5),
            array('nombre'=>'Sector La Aguada', 'parroquia_id'=>5),
            array('nombre'=>'Sector La Horcaz', 'parroquia_id'=>5),
            array('nombre'=>'Sector La Laguna', 'parroquia_id'=>5),
            array('nombre'=>'Sector La Magdalena', 'parroquia_id'=>5),
            array('nombre'=>'Sector La Quebrada', 'parroquia_id'=>5),
            array('nombre'=>'Sector Macigual', 'parroquia_id'=>5),
            array('nombre'=>'Sector Mucundó', 'parroquia_id'=>5),
            array('nombre'=>'Sector Mucuquí', 'parroquia_id'=>5),
            array('nombre'=>'Sector Pueblo Nuevo', 'parroquia_id'=>5),
            array('nombre'=>'Sector Puente Real', 'parroquia_id'=>5),
            array('nombre'=>'Sector La Joya', 'parroquia_id'=>5),
            // San Juan
            array('nombre'=>'Centro San Juan', 'parroquia_id'=>6),
            array('nombre'=>'Barrio El Corozo', 'parroquia_id'=>6),
            array('nombre'=>'Barrio Mucumi', 'parroquia_id'=>6),
            array('nombre'=>'Sector Las González', 'parroquia_id'=>6),
            array('nombre'=>'Sector Sulbarán', 'parroquia_id'=>6),
            array('nombre'=>'Urbanización El Cementerio', 'parroquia_id'=>6),
            array('nombre'=>'Urbanización Estanquillo Alto', 'parroquia_id'=>6),
            array('nombre'=>'Urbanización Estanquillo Bajo', 'parroquia_id'=>6),
            array('nombre'=>'Urbanización Estanquillo Medio', 'parroquia_id'=>6),
            array('nombre'=>'Urbanización Inrevi', 'parroquia_id'=>6),
            array('nombre'=>'Urbanización La Puerta', 'parroquia_id'=>6),
            array('nombre'=>'Urbanización La Variante', 'parroquia_id'=>6),
            array('nombre'=>'Urbanización Piedras Negras', 'parroquia_id'=>6),
            array('nombre'=>'Urbanización Puente Carabobo', 'parroquia_id'=>6),            
        );
        
        NSector::insert($data);
    }
}
