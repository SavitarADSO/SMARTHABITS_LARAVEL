<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // Llama al seeder de usuario
        $this->call(UserSeeder::class);

        // Llama al seeder de actividad física
        $this->call(ActividadSeeder::class);

        // Llama al seeder de enfermedades
        $this->call(EnfermedadSeeder::class);

        // Llama al seeder de ejercicios
        $this->call(EjercicioSeeder::class);
    }
}
