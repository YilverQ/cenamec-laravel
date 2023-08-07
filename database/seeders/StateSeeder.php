<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        State::create(['name' => 'Amazonas']);
        State::create(['name' => 'Anzoátegui']);
        State::create(['name' => 'Apure']);
        State::create(['name' => 'Aragua']);
        State::create(['name' => 'Barinas']);
        State::create(['name' => 'Bolívar']);
        State::create(['name' => 'Carabobo']);
        State::create(['name' => 'Cojedes']);
        State::create(['name' => 'Delta Amacuro']);
        State::create(['name' => 'Distrito Capital']);
        State::create(['name' => 'Falcón']);
        State::create(['name' => 'Guárico']);
        State::create(['name' => 'Lara']);
        State::create(['name' => 'La Guaira']);
        State::create(['name' => 'Mérida']);
        State::create(['name' => 'Miranda']);
        State::create(['name' => 'Monagas']);
        State::create(['name' => 'Nueva Esparta']);
        State::create(['name' => 'Portuguesa']);
        State::create(['name' => 'Sucre']);
        State::create(['name' => 'Táchira']);
        State::create(['name' => 'Trujillo']);
        State::create(['name' => 'Yaracuy']);
        State::create(['name' => 'Zulia']);
    }
}
