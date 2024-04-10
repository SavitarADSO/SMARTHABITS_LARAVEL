<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actividad;

class ActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Array con los niveles de actividad física
        $niveles = ['Sedentario', 'Bajo', 'Medio', 'Alto', 'Muy Alto'];

        // Itera sobre cada nivel y crea un registro en la tabla 'actividads'
        foreach ($niveles as $nivel) {
            Actividad::create([
                'nivel' => $nivel,
            ]);
        }
    }
}
