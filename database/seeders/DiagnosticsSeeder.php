<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiagnosticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $diagnostics = [
            ['name' => 'Diagnóstico 1', 'description' => 'Descripción del Diagnóstico 1', 'created_at' => now()],
            ['name' => 'Diagnóstico 2', 'description' => 'Descripción del Diagnóstico 2', 'created_at' => now()],
            ['name' => 'Diagnóstico 3', 'description' => 'Descripción del Diagnóstico 3', 'created_at' => now()],
            ['name' => 'Diagnóstico 4', 'description' => 'Descripción del Diagnóstico 4', 'created_at' => now()],
            ['name' => 'Diagnóstico 5', 'description' => 'Descripción del Diagnóstico 5', 'created_at' => now()],
            ['name' => 'Diagnóstico 6', 'description' => 'Descripción del Diagnóstico 6', 'created_at' => now()],
            ['name' => 'Diagnóstico 7', 'description' => 'Descripción del Diagnóstico 7', 'created_at' => now()],
            ['name' => 'Diagnóstico 8', 'description' => 'Descripción del Diagnóstico 8', 'created_at' => now()],
            ['name' => 'Diagnóstico 9', 'description' => 'Descripción del Diagnóstico 9', 'created_at' => now()],
            ['name' => 'Diagnóstico 10', 'description' => 'Descripción del Diagnóstico 10', 'created_at' => now()],
            ['name' => 'Diagnóstico 11', 'description' => 'Descripción del Diagnóstico 11', 'created_at' => now()],
            ['name' => 'Diagnóstico 12', 'description' => 'Descripción del Diagnóstico 12', 'created_at' => now()],
            ['name' => 'Diagnóstico 13', 'description' => 'Descripción del Diagnóstico 13', 'created_at' => now()],
            ['name' => 'Diagnóstico 14', 'description' => 'Descripción del Diagnóstico 14', 'created_at' => now()],
            ['name' => 'Diagnóstico 15', 'description' => 'Descripción del Diagnóstico 15', 'created_at' => now()],
            ['name' => 'Diagnóstico 16', 'description' => 'Descripción del Diagnóstico 16', 'created_at' => now()],
            ['name' => 'Diagnóstico 17', 'description' => 'Descripción del Diagnóstico 17', 'created_at' => now()],
            ['name' => 'Diagnóstico 18', 'description' => 'Descripción del Diagnóstico 18', 'created_at' => now()],
            ['name' => 'Diagnóstico 19', 'description' => 'Descripción del Diagnóstico 19', 'created_at' => now()],
            ['name' => 'Diagnóstico 20', 'description' => 'Descripción del Diagnóstico 20', 'created_at' => now()],
        ];

        DB::table('diagnostics')->insert($diagnostics);
    }
}
