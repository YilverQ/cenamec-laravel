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
        Administrator::create([
            'name' => 'Yilver',
            'lastname' => 'Quevedo',
            'email' => 'yilver@admin.com',
            'password' => 'root',
        ]);

        Administrator::create([
            'name' => 'Vanessa',
            'lastname' => 'Longa',
            'email' => 'vanessa@admin.com',
            'password' => 'root',
        ]);

        Administrator::create([
            'name' => 'Cenamec',
            'lastname' => 'Cenamec',
            'email' => 'cenamec@admin.com',
            'password' => 'root',
        ]);

        Administrator::create([
            'name' => 'root',
            'lastname' => 'root',
            'email' => 'root@admin.com',
            'password' => 'root',
        ]);

        #Administrator::factory(4)->create();
    }
}
