<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateGradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = [
            1 => 'الصف الأول الابتدائي',
            2 => 'الصف الثاني الابتدائي',
            3 => 'الصف الثالث الابتدائي',
            4 => 'الصف الرابع الابتدائي',
            5 => 'الصف الخامس الابتدائي',
            6 => 'الصف السادس الابتدائي',
            7 => 'الصف الأول المتوسط',
            8 => 'الصف الثاني المتوسط',
            9 => 'الصف الثالث المتوسط',
            10 => 'الصف الأول الثانوي',
            11 => 'الصف الثاني الثانوي',
            12 => 'الصف الثالث الثانوي',
        ];

        foreach ($grades as $id => $name) {
            Grade::firstOrCreate([
                'id' => $id,
            ], [
                'name' => $name,
            ]);
        }
    }
}
