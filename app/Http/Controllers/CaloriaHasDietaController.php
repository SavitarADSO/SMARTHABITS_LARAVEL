<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\DietaCreada;
use App\Models\CaloriaHasDieta;
use App\Models\User;
use App\Models\Caloria;
use App\Models\Dieta;

class CaloriaHasDietaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caloriasHasDietas = CaloriaHasDieta::with('caloria.user', 'dieta')->get();
        
        $formattedData = $caloriasHasDietas->map(function ($caloriaHasDieta) {
            return [
                'id'  =>$caloriaHasDieta->id,
                'caloria_id' => $caloriaHasDieta->caloria->user->name,
                'dieta_id' => $caloriaHasDieta->dieta->recommended_foods,
            ];
        });

        return response()->json($formattedData, 200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'caloria_id' => 'required|exists:calorias,id',
        'dieta_id' => 'required|exists:dietas,id',
    ]);

    // Verificar si la relación ya existe
    $existingRelation = CaloriaHasDieta::where('caloria_id', $request->caloria_id)
                                        ->where('dieta_id', $request->dieta_id)
                                        ->exists();

    if ($existingRelation) {
        return response()->json(['error' => 'Esta relación ya existe.'], 422);
    }

    // Si la relación no existe, crearla
    $caloriaHasDieta = new CaloriaHasDieta();
    $caloriaHasDieta->caloria_id = $request->caloria_id;
    $caloriaHasDieta->dieta_id = $request->dieta_id;
    $caloriaHasDieta->save();

    // Obtener el usuario asociado a la caloria
    $caloria = Caloria::find($request->caloria_id);
    $usuario = $caloria->user;

    // Enviar el correo electrónico
    Mail::to($usuario->email)->send(new DietaCreada());

    return response()->json($usuario->email, 201);
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $caloriaHasDieta = CaloriaHasDieta::find($id);
        if (!$caloriaHasDieta) {
            return response()->json(['error' => 'CaloriaHasDieta not found'], 404);
        }
        return response()->json($caloriaHasDieta, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'caloria_id' => 'exists:calorias,id',
            'dieta_id' => 'exists:dietas,id',
        ]);

        $caloriaHasDieta = CaloriaHasDieta::find($id);
        if (!$caloriaHasDieta) {
            return response()->json(['error' => 'CaloriaHasDieta not found'], 404);
        }

        $caloriaHasDieta->caloria_id = $request->caloria_id ?? $caloriaHasDieta->caloria_id;
        $caloriaHasDieta->dieta_id = $request->dieta_id ?? $caloriaHasDieta->dieta_id;
        $caloriaHasDieta->save();

        return response()->json($caloriaHasDieta, 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $caloriaHasDieta = CaloriaHasDieta::find($id);
        if (!$caloriaHasDieta) {
            return response()->json(['error' => 'CaloriaHasDieta not found'], 404);
        }
        $caloriaHasDieta->delete();
        return response()->json(null, 204);
    }
    

}
