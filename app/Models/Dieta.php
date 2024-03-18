<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dieta extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'diet_type',
        'recommended_foods',
    ];
    protected $table = 'dietas';

    public function calorias()
    {
        return $this->belongsToMany(Caloria::class, 'calorias_has_dietas', 'dieta_id', 'caloria_id');
    }
    
}
