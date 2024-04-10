<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ejercicio;

class EjercicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ejercicios para rutina de gimnasio de 3 días
        $rutinaGimnasio3Dias = [
            'routine_type' => 'Gym',
            'days_of_week' => '3',
            'exercises' => 'Día 1: Entrenamiento de cuerpo completo.
                            - Sentadillas: 3 series de 10 repeticiones
                            - Presas de banca: 3 series de 10 repeticiones
                            - Peso muerto: 3 series de 10 repeticiones
                            - Dominadas: 3 series de 8 repeticiones
                            - Fondos en paralelas: 3 series de 10 repeticiones
                            - Plancha: 3 series de 30 segundos
                            
                            Día 2: Entrenamiento de tren superior.
                            - Press de hombros: 3 series de 10 repeticiones
                            - Remo con barra: 3 series de 10 repeticiones
                            - Press de tríceps: 3 series de 10 repeticiones
                            - Curl de bíceps: 3 series de 10 repeticiones
                            - Elevaciones laterales: 3 series de 12 repeticiones
                            - Abdominales Crunch: 3 series de 15 repeticiones
                            
                            Día 3: Entrenamiento de tren inferior y core.
                            - Prensa de piernas: 3 series de 12 repeticiones
                            - Zancadas: 3 series de 10 repeticiones (cada pierna)
                            - Elevación de talones: 3 series de 15 repeticiones
                            - Curl de piernas acostado: 3 series de 10 repeticiones
                            - Plancha lateral: 3 series de 30 segundos (cada lado)
                            - Elevación de piernas colgado: 3 series de 12 repeticiones'
        ];

        // Ejercicios para rutina de gimnasio de 4 días
        $rutinaGimnasio4Dias = [
            'routine_type' => 'Gym',
            'days_of_week' => '4',
            'exercises' => 'Día 1: Pecho y tríceps.
                            - Press de banca: 4 series de 10 repeticiones
                            - Press inclinado con mancuernas: 3 series de 10 repeticiones
                            - Fondos en paralelas: 3 series de 12 repeticiones
                            - Press de tríceps con barra: 3 series de 10 repeticiones
                            - Extensiones de tríceps en polea alta: 3 series de 12 repeticiones
                            
                            Día 2: Espalda y bíceps.
                            - Dominadas: 4 series de 8 repeticiones
                            - Remo con barra: 3 series de 10 repeticiones
                            - Pulldowns al pecho: 3 series de 12 repeticiones
                            - Curl de bíceps con barra: 3 series de 12 repeticiones
                            - Curl martillo: 3 series de 12 repeticiones
                            
                            Día 3: Piernas.
                            - Sentadillas: 4 series de 10 repeticiones
                            - Prensa de piernas: 3 series de 12 repeticiones
                            - Curl de piernas acostado: 3 series de 12 repeticiones
                            - Elevación de talones: 4 series de 15 repeticiones
                            - Extensiones de cuádriceps: 3 series de 12 repeticiones
                            
                            Día 4: Hombros y trapecios.
                            - Press militar: 4 series de 10 repeticiones
                            - Elevaciones laterales: 3 series de 12 repeticiones
                            - Elevaciones frontales con mancuernas: 3 series de 12 repeticiones
                            - Pájaros: 3 series de 15 repeticiones
                            - Encogimientos de trapecios: 4 series de 12 repeticiones'
        ];

        // Ejercicios para rutina de gimnasio de 5 días
        $rutinaGimnasio5Dias = [
            'routine_type' => 'Gym',
            'days_of_week' => '5',
            'exercises' => 'Día 1: Pecho y tríceps.
                            - Press de banca: 4 series de 10 repeticiones
                            - Press inclinado con mancuernas: 3 series de 10 repeticiones
                            - Fondos en paralelas: 3 series de 112 repeticiones
                            - Press de tríceps con barra: 3 series de 10 repeticiones
                            - Extensiones de tríceps en polea alta: 3 series de 12 repeticiones
                            
                            Día 2: Espalda y bíceps.
                            - Dominadas: 4 series de 8 repeticiones
                            - Remo con barra: 3 series de 10 repeticiones
                            - Pulldowns al pecho: 3 series de 12 repeticiones
                            - Curl de bíceps con barra: 3 series de 12 repeticiones
                            - Curl martillo: 3 series de 12 repeticiones
                            
                            Día 3: Piernas.
                            - Sentadillas: 4 series de 10 repeticiones
                            - Prensa de piernas: 3 series de 12 repeticiones
                            - Curl de piernas acostado: 3 series de 12 repeticiones
                            - Elevación de talones: 4 series de 15 repeticiones
                            - Extensiones de cuádriceps: 3 series de 12 repeticiones
                            
                            Día 4: Hombros y trapecios.
                            - Press militar: 4 series de 10 repeticiones
                            - Elevaciones laterales: 3 series de 12 repeticiones
                            - Elevaciones frontales con mancuernas: 3 series de 12 repeticiones
                            - Pájaros: 3 series de 15 repeticiones
                            - Encogimientos de trapecios: 4 series de 12 repeticiones
                            
                            Día 5: Rutina de cuerpo completo.
                            - Flexiones de brazos: 3 series de 12 repeticiones
                            - Peso muerto: 4 series de 10 repeticiones
                            - Fondos de tríceps en banco: 3 series de 12 repeticiones
                            - Dominadas: 3 series de 8 repeticiones
                            - Abdominales crunch: 3 series de 15 repeticiones'
        ];

        // Ejercicios para rutina de gimnasio de 6 días
        $rutinaGimnasio6Dias = [
            'routine_type' => 'Gym',
            'days_of_week' => '6',
            'exercises' => 'Día 1: Pecho.
                            - Press de banca: 4 series de 10 repeticiones
                            - Press inclinado con mancuernas: 3 series de 10 repeticiones
                            - Fondos en paralelas: 3 series de 12 repeticiones
                            - Aperturas con mancuernas: 3 series de 12 repeticiones
                            - Flexiones declinadas: 3 series de 12 repeticiones
                            
                            Día 2: Espalda.
                            - Dominadas: 4 series de 8 repeticiones
                            - Remo con barra: 4 series de 10 repeticiones
                            - Jalones en polea alta: 3 series de 12 repeticiones
                            - Pullover con mancuerna: 3 series de 12 repeticiones
                            - Peso muerto rumano: 3 series de 10 repeticiones
                            
                            Día 3: Piernas.
                            - Sentadillas: 4 series de 10 repeticiones
                            - Prensa de piernas: 4 series de 12 repeticiones
                            - Extensiones de cuádriceps: 3 series de 12 repeticiones
                            - Curl de piernas acostado: 3 series de 12 repeticiones
                            - Elevación de talones: 4 series de 15 repeticiones
                            
                            Día 4: Hombros.
                            - Press militar: 4 series de 10 repeticiones
                            - Elevaciones laterales: 4 series de 12 repeticiones
                            - Elevaciones frontales con mancuernas: 3 series de 12 repeticiones
                            - Pájaros: 3 series de 12-15 repeticiones
                            - Encogimientos de trapecios: 4 series de 12 repeticiones
                            
                            Día 5: Bíceps y Tríceps.
                            - Curl de bíceps con barra: 4 series de 12 repeticiones
                            - Curl martillo: 3 series de 12 repeticiones
                            - Dominadas de bíceps: 3 series de 10 repeticiones
                            - Press de tríceps con barra: 4 series de 10 repeticiones
                            - Extensiones de tríceps en polea alta: 3 series de 12 repeticiones
                            
                            Día 6: Rutina de cuerpo completo.
                            - Flexiones de brazos: 3 series de 12 repeticiones
                            - Peso muerto: 4 series de 10 repeticiones
                            - Fondos de tríceps en banco: 3 series de 12 repeticiones
                            - Dominadas: 3 series de 8 repeticiones
                            - Abdominales crunch: 3 series de 15 repeticiones'
        ];

        // Ejercicios para rutina de calistenia de 3 días
        $rutinaCalistenia3Dias = [
            'routine_type' => 'Calistenia',
            'days_of_week' => '3',
            'exercises' => 'Día 1: Empuje y tracción.
                            - Flexiones de brazos: 4 series de 15 repeticiones
                            - Dominadas: 4 series de 10 repeticiones
                            - Fondos en paralelas: 3 series de 12 repeticiones
                            - Flexiones diamante: 3 series de 15 repeticiones
                            
                            Día 2: Piernas y core.
                            - Sentadillas: 4 series de 15 repeticiones
                            - Zancadas: 3 series de 10 repeticiones (cada pierna)
                            - Elevaciones de piernas en barra: 3 series de 12 repeticiones
                            - Plancha: 3 series de 30 segundos
                            
                            Día 3: Rutina de cuerpo completo.
                            - Flexiones declinadas: 3 series de 15 repeticiones
                            - Dominadas agarre invertido: 3 series de 10 repeticiones
                            - Sentadilla búlgara: 3 series de 10 repeticiones (cada pierna)
                            - Crunch abdominal: 3 series de 20 repeticiones'
        ];

        // Ejercicios para rutina de calistenia de 4 días
        $rutinaCalistenia4Dias = [
            'routine_type' => 'Calistenia',
            'days_of_week' => '4',
            'exercises' => 'Día 1: Empuje.
                            - Flexiones de brazos: 4 series de 15 repeticiones
                            - Flexiones declinadas: 3 series de 12 repeticiones
                            - Fondos en paralelas: 3 series de 12 repeticiones
                            - Flexiones diamante: 3 series de 15 repeticiones
                            
                            Día 2: Tracción.
                            - Dominadas: 4 series de 10 repeticiones
                            - Dominadas agarre invertido: 3 series de 12 repeticiones
                            - Remo con barra horizontal: 3 series de 12 repeticiones
                            
                            Día 3: Piernas y core.
                            - Sentadillas: 4 series de 15 repeticiones
                            - Zancadas: 3 series de 10 repeticiones (cada pierna)
                            - Elevaciones de piernas en barra: 3 series de 12 repeticiones
                            - Plancha: 3 series de 30 segundos
                            
                            Día 4: Rutina de cuerpo completo.
                            - Combinación de ejercicios de empuje, tracción, piernas y core de los días anteriores, utilizando las mismas repeticiones y series.'
        ];

        // Ejercicios para rutina de calistenia de 5 días
        $rutinaCalistenia5Dias = [
            'routine_type' => 'Calistenia',
            'days_of_week' => '5',
            'exercises' => 'Día 1: Empuje.
                            - Flexiones de brazos: 4 series de 15 repeticiones
                            - Flexiones declinadas: 3 series de 12 repeticiones
                            - Fondos en paralelas: 3 series de 12 repeticiones
                            - Flexiones diamante: 3 series de 15 repeticiones
                            
                            Día 2: Tracción.
                            - Dominadas: 4 series de 10 repeticiones
                            - Dominadas agarre invertido: 3 series de 10 repeticiones
                            - Remo con barra horizontal: 3 series de 12 repeticiones
                            - Remo invertido en barra: 3 series de 12 repeticiones
                            
                            Día 3: Piernas.
                            - Sentadillas: 4 series de 15 repeticiones
                            - Zancadas: 3 series de 10 repeticiones (cada pierna)
                            - Elevaciones de piernas en barra: 3 series de 15 repeticiones
                            - Plancha: 3 series de 30 segundos
                            
                            Día 4: Core.
                            - Crunch abdominal: 4 series de 20 repeticiones
                            - Plancha lateral: 3 series de 30 segundos (cada lado)
                            - Elevaciones de piernas colgado: 3 series de 15 repeticiones
                            
                            Día 5: Rutina de cuerpo completo.
                            - Combinación de ejercicios de empuje, tracción, piernas, y core de los días anteriores.'
        ];

        // Ejercicios para rutina de calistenia de 6 días
        $rutinaCalistenia6Dias = [
            'routine_type' => 'Calistenia',
            'days_of_week' => '6',
            'exercises' => 'Día 1: Empuje.
                            - Flexiones de brazos: 4 series de 15 repeticiones
                            - Flexiones declinadas: 3 series de 12 repeticiones
                            - Fondos en paralelas: 3 series de 12 repeticiones
                            - Flexiones diamante: 3 series de 15 repeticiones
                            
                            Día 2: Tracción.
                            - Dominadas: 4 series de 10 repeticiones
                            - Dominadas agarre invertido: 3 series de 10 repeticiones
                            - Remo con barra horizontal: 3 series de 12 repeticiones
                            - Remo invertido en barra: 3 series de 12 repeticiones
                            
                            Día 3: Piernas.
                            - Sentadillas: 4 series de 15 repeticiones
                            - Zancadas: 3 series de 10 repeticiones (cada pierna)
                            - Elevaciones de piernas en barra: 3 series de 15 repeticiones
                            - Plancha: 3 series de 30-60 segundos
                            
                            Día 4: Core.
                            - Crunch abdominal: 4 series de 20 repeticiones
                            - Plancha lateral: 3 series de 30 segundos (cada lado)
                            - Elevaciones de piernas colgado: 3 series de 15 repeticiones
                            
                            Día 5: Flexibilidad y movilidad.
                            - Estiramientos de cuerpo completo: 1 sesión de 15 minutos
                            - Movilidad articular: 1 sesión de 10 minutos
                            
                            Día 6: Rutina de cuerpo completo.
                            - Flexiones de brazos: 3 series de 12 repeticiones
                            - Dominadas: 3 series de 8 repeticiones
                            - Sentadillas: 3 series de 15 repeticiones
                            - Plancha: 3 series de 45 segundos'
        ];

        // Insertar ejercicios en la base de datos
        Ejercicio::insert([
            $rutinaGimnasio3Dias,
            $rutinaGimnasio4Dias,
            $rutinaGimnasio5Dias,
            $rutinaGimnasio6Dias,
            $rutinaCalistenia3Dias,
            $rutinaCalistenia4Dias,
            $rutinaCalistenia5Dias,
            $rutinaCalistenia6Dias
        ]);
    }
}
