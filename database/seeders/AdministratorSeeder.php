<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Administrator;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Administrator::create(['user_id' => 1]);
        Administrator::create(['user_id' => 2]);
        Administrator::create(['user_id' => 5]);
    }
}
