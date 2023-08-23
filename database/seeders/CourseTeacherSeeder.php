<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;
use App\Models\Course;

class CourseTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = Teacher::all();
        $courses  = Course::all();

        // Relacionar profesores con cursos
        foreach ($teachers as $key => $teacher) {
            $teacher->courses()->attach($courses);
        }
    }
}
