<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'routine_type',
        'days_of_week',
        'exercises',
    ];

    public $timestamps = false;

    protected $table = 'ejercicios';

    public function users()
    {
        return $this->belongsToMany(User::class, 'ejercicios_has_users', 'ejercicios_id', 'users_id');
    }


}
