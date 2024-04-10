<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crea el usuario administrador
        User::create([
            'name' => 'savitar',
            'email' => 'savitar@administrador.com',
            'password' => Hash::make('admin1234'),
            'role' => 'administrador'
        ]);
    }
}
