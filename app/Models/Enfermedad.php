<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nombre'        
    ];

    protected $table = 'enfermedads';

    public function encuestas()
    {
        return $this->belongsToMany(Encuesta::class, 'encuestas_has_enfermedades', 'enfermedads_id', 'encuesta_id');
    }
}
