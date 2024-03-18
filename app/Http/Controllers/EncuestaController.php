<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Actividad;
use App\Models\Enfermedad;
use App\Models\Encuesta;
use App\Models\Caloria;
use App\Models\User;



class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
{
    $userId = Auth::id();  
    $encuestas = Encuesta::where('user_id', $userId)->get();
    
    
    return response()->json($encuestas, 200);
}


public function listarEncuestas()
{
    $encuestas = Encuesta::all();
    return response()->json($encuestas, 200);
}

public function listarEncuestass()
{
    $encuestas = Encuesta::with(['actividad', 'user', 'enfermedades'])->get();
    
    $formattedEncuestas = $encuestas->map(function ($encuesta) {
        $enfermedades = $encuesta->enfermedades->pluck('nombre')->toArray();

        // Verificar si hay enfermedades
        if (empty($enfermedades)) {
            $enfermedadesTexto = '"El usuario no posee enfermedades"';
        } else {
            $enfermedadesTexto = $enfermedades;
        }

        return [
            'id' => $encuesta->id,
            'actividad_id' => $encuesta->actividad->nivel,
            'user_id' => $encuesta->user->name,
            'edad' => $encuesta->edad,
            'peso' => $encuesta->peso,
            'genero' => $encuesta->genero,
            'estatura' => $encuesta->estatura,
            'enfermedades' => $enfermedadesTexto,
        ];
    });

    return response()->json($formattedEncuestas, 200);
}


public function listarEncuesta()
{
    
    $userId = Auth::id();
    
    
    $encuesta = Encuesta::with(['actividad', 'user', 'enfermedades'])
                    ->where('user_id', $userId)
                    ->get();


    
    
    $formattedEncuestas = $encuesta->map(function ($encuesta) {
        $enfermedades = $encuesta->enfermedades->pluck('nombre')->toArray();


        if (empty($enfermedades)) {
            $enfermedadesTexto = '"No posees enfermedades"';
        } else {
            $enfermedadesTexto = $enfermedades;
        }

        return [
            'id' => $encuesta->id,
            'actividad_id' => $encuesta->actividad->nivel,
            'user_id' => $encuesta->user->name,
            'edad' => $encuesta->edad,
            'peso' => $encuesta->peso,
            'genero' => $encuesta->genero,
            'estatura' => $encuesta->estatura,
            'enfermedades' => $enfermedades,
        ];
    });
    return response()->json($formattedEncuestas, 200);
}




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'actividad_id' => 'required|exists:actividads,id',
            'edad' => 'required|integer',
            'peso' => 'required|numeric',
            'genero' => 'required|in:hombre,mujer,Hombre,Mujer',
            'estatura' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
            'enfermedades' => 'array', // Asegúrate de que sea un array
            'enfermedades.*' => 'exists:enfermedads,id', // Asegúrate de que cada enfermedad exista en la base de datos
        ]);

        // Calcular las calorías según la fórmula de Harris-Benedict
        $edad = $request->edad;
        $peso = $request->peso;
        $genero = $request->genero;
        $estatura = $request->estatura;

        if ($genero == 'Hombre' || $genero == 'hombre') {
            $caloriasMantenimiento = 88 + (13 * $peso) + (5 * $estatura) - (6 * $edad);
        } else if ($genero == 'Mujer' || $genero == 'mujer') {
            $caloriasMantenimiento = 447 + (9 * $peso) + (3 * $estatura) - (5 * $edad);
        }

        // Calcular las calorías para volumen, definición y recomposición
        $caloriasVolumen = $caloriasMantenimiento + 400;
        $caloriasDefinicion = $caloriasMantenimiento - 400;
        $caloriasRecomposicion = $caloriasMantenimiento - 100;


        $calorias = Caloria::where("users_id",$request->user_id)->first();

        if (!$calorias){
            $calorias = new Caloria();

        }


        // Guardar los resultados en la base de datos
        $calorias->users_id = $request->user_id; // Asignar el user_id proporcionado en la solicitud HTTP
        $calorias->maintenance_calories = $caloriasMantenimiento;
        $calorias->bulking_calories = $caloriasVolumen; // Calorías para volumen
        $calorias->cutting_calories = $caloriasDefinicion; // Calorías para definición
        $calorias->recomposition_calories = $caloriasRecomposicion; // Calorías para recomposición
        $calorias->save();


        $encuesta = Encuesta::where("user_id",$request->user_id)->first();

        if (!$encuesta){
            $encuesta = new Encuesta();

        }
        // Crear la encuesta
        $encuesta->user_id = $request->user_id;
        $encuesta->actividad_id = $request->actividad_id;
        $encuesta->edad = $request->edad;
        $encuesta->peso = $request->peso;
        $encuesta->genero = $request->genero;
        $encuesta->estatura = $request->estatura;
        $encuesta->save();

        // Asociar las enfermedades a la encuesta en la tabla pivote
        if ($request->has('enfermedades')) {
            $enfermedadesIds = $request->enfermedades;
            $encuesta->enfermedades()->attach($enfermedadesIds);
        }

        // Devolver respuesta adecuada
        return response()->json(
            //'message' => 'Encuesta creada correctamente',
            //'encuesta' => $encuesta,
            //'calorias' => $calorias,
            $encuesta
        , 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function show(Encuesta $encuesta)
    {
        $encuesta = Encuesta::find($id);
        return response()->json($encuesta, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function edit(Encuesta $encuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encuesta $encuesta)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Encuesta $encuesta)
    {
        $encuesta = Encuesta::find($id);
        if($encuesta){
            $encuesta->delete();
            return response()->json(null, 204);
        

        }else{
            return response()->json(['error' => 'Encuesta no encontrada'], 404);
        }
    }
    
}




