<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'actividad_id',
        'edad',
        'peso',
        'genero',
        'estatura'
    ];
    protected $table = 'encuestas';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function enfermedades()
    {
        return $this->belongsToMany(Enfermedad::class, 'encuestas_has_enfermedades', 'encuesta_id', 'enfermedads_id');
    }

    public function actividad()
{
    return $this->belongsTo(Actividad::class, 'actividad_id', 'id');
}

   
}
