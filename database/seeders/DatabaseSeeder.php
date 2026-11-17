<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear usuario administrador principal
        $adminEmail = 'admin@sata.com';
        $admin = DB::table('users')->where('email', $adminEmail)->first();
        
        $adminId = $admin ? $admin->id : DB::table('users')->insertGetId([
            'name' => 'Eduardo Antonio Estrada Luna',
            'email' => $adminEmail,
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Crear grupos académicos
        $gruposBase = [
            ['nombre' => 'Grupo 101 - Sistemas Computacionales', 'codigo' => '101-SC'],
            ['nombre' => 'Grupo 202 - Redes y Telemática', 'codigo' => '202-RT'],
            ['nombre' => 'Grupo 305 - Ingeniería de Software', 'codigo' => '305-IS'],
            ['nombre' => 'Grupo 401 - Base de Datos', 'codigo' => '401-BD'],
        ];

        // Obtener columnas reales de la BD
        $colsGroups = Schema::getColumnListing('groups');
        $colsGroupUser = Schema::getColumnListing('group_user');
        $colsUsers = Schema::getColumnListing('users');
        $colsMessages = Schema::hasTable('messages') ? Schema::getColumnListing('messages') : [];
        $colsAds = Schema::hasTable('ads') ? Schema::getColumnListing('ads') : [];
        $colsAdGroup = Schema::hasTable('ad_group') ? Schema::getColumnListing('ad_group') : [];

        $todosLosGruposIds = [];

        foreach ($gruposBase as $g) {
            $dataGroup = [];

            if (in_array('name', $colsGroups)) $dataGroup['name'] = $g['nombre'];
            elseif (in_array('nombre', $colsGroups)) $dataGroup['nombre'] = $g['nombre'];

            if (in_array('code', $colsGroups)) $dataGroup['code'] = $g['codigo'];
            
            if (in_array('period', $colsGroups)) $dataGroup['period'] = '2026-2';
            elseif (in_array('periodo', $colsGroups)) $dataGroup['periodo'] = '2026-2';
            
            if (in_array('created_at', $colsGroups)) $dataGroup['created_at'] = now();
            if (in_array('updated_at', $colsGroups)) $dataGroup['updated_at'] = now();

            $groupId = DB::table('groups')->insertGetId($dataGroup);
            $todosLosGruposIds[] = $groupId;

            // 3. Crear 8 alumnos por grupo
            for ($i = 1; $i <= 8; $i++) {
                $emailRandom = 'alumno' . $groupId . '_' . $i . '_' . rand(100, 999) . '@sata.com';
                
                $userData = [
                    'name' => 'Alumno ' . $i . ' del Grupo ' . $groupId,
                    'email' => $emailRandom,
                    'password' => Hash::make('password123'),
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                ];

                if (in_array('matricula', $colsUsers)) $userData['matricula'] = '2026' . rand(1000, 9999);
                if (in_array('created_at', $colsUsers)) $userData['created_at'] = now();
                if (in_array('updated_at', $colsUsers)) $userData['updated_at'] = now();

                $userId = DB::table('users')->insertGetId($userData);

                // Vincular al grupo
                $pivotData = [];
                if (in_array('group_id', $colsGroupUser)) $pivotData['group_id'] = $groupId;
                elseif (in_array('Id_group', $colsGroupUser)) $pivotData['Id_group'] = $groupId;
                
                if (in_array('user_id', $colsGroupUser)) $pivotData['user_id'] = $userId;
                elseif (in_array('User_id', $colsGroupUser)) $pivotData['User_id'] = $userId;
                
                if (in_array('created_at', $colsGroupUser)) $pivotData['created_at'] = now();
                if (in_array('updated_at', $colsGroupUser)) $pivotData['updated_at'] = now();

                DB::table('group_user')->insert($pivotData);

                // 4. Inyectar mensajes de prueba
                if ($i <= 2 && !empty($colsMessages)) {
                    $msgData = [];
                    
                    if (in_array('user_id', $colsMessages)) $msgData['user_id'] = $userId;
                    elseif (in_array('User_id', $colsMessages)) $msgData['User_id'] = $userId;

                    if (in_array('sender_id', $colsMessages)) $msgData['sender_id'] = $userId;
                    elseif (in_array('Sender_id', $colsMessages)) $msgData['Sender_id'] = $userId;

                    if (in_array('receiver_id', $colsMessages)) $msgData['receiver_id'] = $adminId;
                    elseif (in_array('Receiver_id', $colsMessages)) $msgData['Receiver_id'] = $adminId;
                    
                    if (in_array('subject', $colsMessages)) $msgData['subject'] = 'Duda de proyecto';
                    elseif (in_array('title', $colsMessages)) $msgData['title'] = 'Duda de proyecto';
                    elseif (in_array('Title', $colsMessages)) $msgData['Title'] = 'Duda de proyecto';
                    
                    if (in_array('body', $colsMessages)) $msgData['body'] = 'Hola profesor, tengo una duda con la calificación.';
                    elseif (in_array('content', $colsMessages)) $msgData['content'] = 'Hola profesor, tengo una duda con la calificación.';
                    
                    if (in_array('created_at', $colsMessages)) $msgData['created_at'] = now();
                    if (in_array('updated_at', $colsMessages)) $msgData['updated_at'] = now();

                    DB::table('messages')->insert($msgData);
                }
            }
        }

        // 5. Inyectar Avisos generales
        if (!empty($colsAds)) {
            for ($j = 1; $j <= 3; $j++) {
                $adData = [];
                if (in_array('title', $colsAds)) $adData['title'] = 'Aviso Académico Importante #' . $j;
                elseif (in_array('Title', $colsAds)) $adData['Title'] = 'Aviso Académico Importante #' . $j;
                elseif (in_array('titulo', $colsAds)) $adData['titulo'] = 'Aviso Académico Importante #' . $j;
                
                if (in_array('content', $colsAds)) $adData['content'] = 'Este es un aviso automático para el temario.';
                elseif (in_array('body', $colsAds)) $adData['body'] = 'Este es un aviso automático para el temario.';
                
                if (in_array('user_id', $colsAds)) $adData['user_id'] = $adminId;
                elseif (in_array('User_id', $colsAds)) $adData['User_id'] = $adminId;
                
                if (in_array('sender_id', $colsAds)) $adData['sender_id'] = $adminId;
                elseif (in_array('Sender_id', $colsAds)) $adData['Sender_id'] = $adminId;
                
                if (in_array('created_at', $colsAds)) $adData['created_at'] = now();
                if (in_array('updated_at', $colsAds)) $adData['updated_at'] = now();

                $adId = DB::table('ads')->insertGetId($adData);

                // Vincular aviso a grupos (Corregido para detectar Id_ads)
                if (!empty($colsAdGroup)) {
                    foreach (array_slice($todosLosGruposIds, 0, 2) as $gId) {
                        $adGroupData = [];
                        
                        if (in_array('Id_ads', $colsAdGroup)) $adGroupData['Id_ads'] = $adId;
                        elseif (in_array('ad_id', $colsAdGroup)) $adGroupData['ad_id'] = $adId;
                        elseif (in_array('Ad_id', $colsAdGroup)) $adGroupData['Ad_id'] = $adId;

                        if (in_array('Id_group', $colsAdGroup)) $adGroupData['Id_group'] = $gId;
                        elseif (in_array('group_id', $colsAdGroup)) $adGroupData['group_id'] = $gId;
                        
                        if (in_array('created_at', $colsAdGroup)) $adGroupData['created_at'] = now();
                        if (in_array('updated_at', $colsAdGroup)) $adGroupData['updated_at'] = now();
                        
                        DB::table('ad_group')->insert($adGroupData);
                    }
                }
            }
        }
    }
}