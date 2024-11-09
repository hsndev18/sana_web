<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateSemestersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semesters = [
            1 => 'الفصل الدراسي الأول',
            2 => 'الفصل الدراسي الثاني',
            3 => 'الفصل الدراسي الثالث',
            4 => 'الفصل الدراسي الصيفي',
        ];

        foreach ($semesters as $id => $semester) {
            Semester::firstOrCreate([
                'id' => $id,
            ], [
                'name' => $semester,
            ]);
        }
    }
}
