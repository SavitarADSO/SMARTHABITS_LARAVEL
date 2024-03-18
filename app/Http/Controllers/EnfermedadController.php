<?php

namespace App\Http\Controllers;

use App\Models\Enfermedad;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EnfermedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enfermedades = Enfermedad::all();
        return response()->json($enfermedades);
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
            'nombre' => 'required|string|max:255',
        ]);

        $enfermedad = new Enfermedad;
        $enfermedad->nombre = $request->nombre;
        $enfermedad->save();

        return response()->json($enfermedad, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enfermedad = Enfermedad::findOrFail($id);
        return response()->json($enfermedad);
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
            'nombre' => 'required|string|max:255',
        ]);

        $enfermedad = Enfermedad::findOrFail($id);
        $enfermedad->nombre = $request->nombre;
        $enfermedad->save();

        return response()->json($enfermedad, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enfermedad = Enfermedad::findOrFail($id);
        $enfermedad->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    
}

