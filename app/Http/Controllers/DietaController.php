<?php

namespace App\Http\Controllers;


use App\Models\CaloriaHasDieta;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Dieta;
use App\Models\Caloria;
use App\Models\Ejercicio;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DietaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dietas = Dieta::all();
        return response()->json($dietas);
    }

    public function DietaCaloria()
{
    
    $userId = Auth::id();
    $calorias = Caloria::where('users_id', $userId)->get();
    $dietas = collect();

    foreach ($calorias as $caloria) {
        $caloriaDietas = $caloria->dietas()->get();
        $dietas = $dietas->merge($caloriaDietas);
    }
    return response()->json($dietas->unique(), 200);
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
            'diet_type' => 'required|string',
            'recommended_foods' => 'required|string',
        ]);

        $dieta = new Dieta;
        $dieta->fill($request->all());
        $dieta->save();

        return response()->json($dieta, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dieta = Dieta::with(['user', 'calorias'])->findOrFail($id);
        return response()->json($dieta);
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

            'diet_type' => 'string',
            'recommended_foods' => 'string',
        ]);

        $dieta = Dieta::findOrFail($id);
        $dieta->fill($request->all());
        $dieta->save();

        return response()->json($dieta, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dieta = Dieta::findOrFail($id);
        $dieta->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
    
}
