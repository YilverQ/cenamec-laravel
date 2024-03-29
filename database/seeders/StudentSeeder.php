<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create(['user_id' => 1]);
        Student::create(['user_id' => 2]);
        Student::create(['user_id' => 3]);
        Student::create(['user_id' => 4]);
        Student::create(['user_id' => 5]);
        Student::create(['user_id' => 6]);
        Student::create(['user_id' => 7]);
        Student::create(['user_id' => 8]);
    }
}
