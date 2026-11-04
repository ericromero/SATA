<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Roles del Sistema (Usando updateOrInsert para evitar duplicados)
        $roles = [
            ['id' => 1, 'name' => 'Docente / Profesor'],
            ['id' => 2, 'name' => 'Tutor Académico'],
            ['id' => 3, 'name' => 'Funcionario / Administrador'],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->updateOrInsert(
                ['id' => $role['id']],
                ['name' => $role['name'], 'updated_at' => now(), 'created_at' => now()]
            );
        }

        // 2. Unidades / Áreas (IDs del 1 al 12)
        $units = [
            // --- División Escolarizado (IDs 1 al 6) ---
            ['id' => 1, 'name' => 'Educativa', 'level' => 'Escolarizado', 'parent_id' => null],
            ['id' => 2, 'name' => 'Clínica', 'level' => 'Escolarizado', 'parent_id' => null],
            ['id' => 3, 'name' => 'Cognitivo Conductual', 'level' => 'Escolarizado', 'parent_id' => null],
            ['id' => 4, 'name' => 'Organizacional', 'level' => 'Escolarizado', 'parent_id' => null],
            ['id' => 5, 'name' => 'Social', 'level' => 'Escolarizado', 'parent_id' => null],
            ['id' => 6, 'name' => 'Neuro', 'level' => 'Escolarizado', 'parent_id' => null],

            // --- División SUA (IDs 7 al 12) ---
            ['id' => 7, 'name' => 'Educativa', 'level' => 'SUA', 'parent_id' => null],
            ['id' => 8, 'name' => 'Clínica', 'level' => 'SUA', 'parent_id' => null],
            ['id' => 9, 'name' => 'Cognitivo Conductual', 'level' => 'SUA', 'parent_id' => null],
            ['id' => 10, 'name' => 'Organizacional', 'level' => 'SUA', 'parent_id' => null],
            ['id' => 11, 'name' => 'Social', 'level' => 'SUA', 'parent_id' => null],
            ['id' => 12, 'name' => 'Neuro', 'level' => 'SUA', 'parent_id' => null],
        ];

        foreach ($units as $unit) {
            DB::table('units')->updateOrInsert(
                ['id' => $unit['id']],
                [
                    'name' => $unit['name'], 
                    'level' => $unit['level'], 
                    'parent_id' => $unit['parent_id'], 
                    'updated_at' => now(), 
                    'created_at' => now()
                ]
            );
        }
    }
}