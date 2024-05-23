<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiagnosticsToPacientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $assignments = [];

        for ($i = 1; $i <= 20; $i++) {
            for ($j = 1; $j <= 20; $j++) {
                $assignments[] = [
                    'patient_id' => $i,
                    'diagnostics_id' => $j,
                    'observations' => 'Observations for patient ' . $i . ' and diagnostic ' . $j,
                    'created_at' => now()
                ];
            }
        }

        DB::table('diagnostic_to_pacients')->insert($assignments);
    }
}
