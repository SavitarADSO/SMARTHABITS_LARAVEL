<?php

namespace App\Http\Controllers;

use App\Models\Ejercicio;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EjercicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ejercicios = Ejercicio::all();
        return response()->json($ejercicios);
    }

    public function listar()
    {
        $userId = Auth::id();  
        $ejercicios = Ejercicio::where('user_id', $userId)->get();
        
        return response()->json($ejercicios, 200);
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

            'routine_type' => 'required|string',
            'days_of_week' => 'required|string',
            'exercises' => 'required|string'
        ]);

        $ejercicio = new Ejercicio;
        $ejercicio->fill($request->all());
        $ejercicio->save();

        return response()->json($ejercicio, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ejercicio = Ejercicio::with('user')->findOrFail($id);
        return response()->json($ejercicio);
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
            'routine_type' => 'string',
            'days_of_week' => 'string',
            'exercises' => 'string'
        ]);

        $ejercicio = Ejercicio::findOrFail($id);
        $ejercicio->fill($request->all());
        $ejercicio->save();

        return response()->json($ejercicio, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ejercicio = Ejercicio::findOrFail($id);
        $ejercicio->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
