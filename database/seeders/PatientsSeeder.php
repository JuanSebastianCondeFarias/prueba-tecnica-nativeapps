<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patients = [];

        for ($i = 1; $i <= 20; $i++) {
            $patients[] = [
                'document' => 'DOC' . str_pad($i, 5, '0', STR_PAD_LEFT),
                'first_name' => 'FirstName' . $i,
                'last_name' => 'LastName' . $i,
                'birth_date' => now()->subYears(30)->subDays($i)->format('Y-m-d'),
                'email' => 'patient' . $i . '@example.com',
                'phone' => '123-456-78' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'genre' => $i % 2 == 0 ? 'Male' : 'Female',
                'created_at' => now()
            ];
        }

        DB::table('patients')->insert($patients);
    }
}
