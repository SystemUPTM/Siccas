<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(NTipoTrimestreSeeder::class);
        $this->call(NParroquiasTableSeeder::class);
        $this->call(NSectoresTableSeeder::class);
        $this->call(NPreguntasRecuperacionTableSeeder::class);
    }
}
