<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crea la cuenta de administrador inyectada
        User::create([
            'name' => 'Administrador SATA',
            'email' => 'admin@sata.com',
            'password' => Hash::make('admin123'), // Contraseña encriptada
            'is_active' => true,
        ]);
    }
}