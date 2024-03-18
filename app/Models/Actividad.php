<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nivel'        
    ];

    protected $table = 'actividads';

    public function encuestas()
    {
        return $this->hasMany(Encuesta::class, 'actividad_id', 'id');
    }
}

