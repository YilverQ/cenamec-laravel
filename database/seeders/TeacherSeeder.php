<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::create(['user_id' => 1]);
        Teacher::create(['user_id' => 2]);
        Teacher::create(['user_id' => 4]);
    }
}
