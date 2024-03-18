<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Caloria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CaloriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();  
        $calorias = Caloria::where('users_id', $userId)->get();
        
        return response()->json($calorias, 200);
    }

    public function listarCalorias()
    {
        $calorias = Caloria::all();
        return response()->json($calorias, 200);
    }

    public function listarCaloria()
{
    $calorias = Caloria::with('user')->get();
    $formattedCalorias = $calorias->map(function ($caloria) {
        return [
            'id'=> $caloria->id,
            'users_id' => $caloria->user->name,
            'maintenance_calories' => $caloria->maintenance_calories,
            'bulking_calories' => $caloria->bulking_calories,
            'cutting_calories' => $caloria->cutting_calories,
            'recomposition_calories' => $caloria->recomposition_calories,
        ];
    });

    return response()->json($formattedCalorias, 200);
}


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caloria  $caloria
     * @return \Illuminate\Http\Response
     */
    public function show(Caloria $caloria)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Caloria  $caloria
     * @return \Illuminate\Http\Response
     */
    public function edit(Caloria $caloria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Caloria  $caloria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caloria $caloria)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caloria  $caloria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caloria $caloria)
    {

    }
    
}

