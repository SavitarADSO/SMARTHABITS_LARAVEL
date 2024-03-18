<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caloria extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'user_id',
        'maintenance_calories',
        'bulking_calories',
        'cutting_calories',
        'recomposition_calories',
        
    ];
    protected $table = 'calorias';

    
    public function dietas()
    {
        return $this->belongsToMany(Dieta::class, 'calorias_has_dietas', 'caloria_id', 'dieta_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

}
