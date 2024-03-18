<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaloriaHasDieta extends Model
{
    use HasFactory;

    public $timestamps = false;

    
    protected $table = 'calorias_has_dietas';

    public function caloria()
    {
        return $this->belongsTo(Caloria::class, 'caloria_id');
    }

    public function dieta()
    {
        return $this->belongsTo(Dieta::class, 'dieta_id');
    }

}