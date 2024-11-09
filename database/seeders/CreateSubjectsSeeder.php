<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateSubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            1 => 'الدراسات الاجتماعية والوطنية',

        ];

        foreach ($subjects as $id => $subject) {
            Subject::firstOrCreate([
                'id' => $id,
            ], [
                'name' => $subject,
            ]);
        }
    }
}
