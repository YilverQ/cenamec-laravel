<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Course;


class CourseStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::all();
        $courses  = Course::all();

        // Relacionar profesores con cursos
        foreach ($students as $key => $student) {
            $randomNumber = rand(1, 4);
            $student->courses()->attach([$randomNumber]);
        }
    }
}
