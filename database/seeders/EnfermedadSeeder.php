<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enfermedad;

class EnfermedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Array con los nombres de las enfermedades
        $enfermedades = [
            'Obesidad',
            'Diabetes',
            'Colesterol alto',
            'Intolerancia a los lácteos',
            'Taquicardia',
            'Alergia al maní',
            'Alergia a los mariscos'
        ];

        // Itera sobre cada enfermedad y crea un registro en la tabla 'enfermedads'
        foreach ($enfermedades as $enfermedad) {
            Enfermedad::create([
                'nombre' => $enfermedad,
            ]);
        }
    }
}
