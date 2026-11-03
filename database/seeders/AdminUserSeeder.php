<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inyectamos la cuenta de Administrador que pidió el profesor
        User::updateOrCreate(
            ['email' => 'admin@sata.unam.mx'], // Correo
            [
                'name' => 'Administrador SATA',
                'password' => Hash::make('admin12345'), // Contraseña
                'email_verified_at' => now(),
            ]
        );
    }
}