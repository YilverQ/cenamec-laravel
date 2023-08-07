<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Module;
use App\Models\Certificate;
use App\Models\Note;
use App\Models\Questionnaire;

use App\Models\State;
use App\Models\Municipalitie;
use App\Models\Parishe;
use App\Models\User;
use App\Models\Administrator;
use App\Models\Teacher;
use App\Models\Student;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * Los seeder deben ejecutarse según el orden de las migraciones.
     * $this->call(ModelSeeder::class);
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        #$this->call(CourseSeeder::class);
        #$this->call(ModuleSeeder::class);
        #$this->call(NoteSeeder::class);
        #$this->call(QuestionnaireSeeder::class);
        #$this->call(CertificateSeeder::class);


        $this->call(StateSeeder::class);
        $this->call(MunicipalitieSeeder::class);
        $this->call(ParisheSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AdministratorSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(StudentSeeder::class);


        #Administrator::factory(2)->create();
        #Teacher::factory(8)->create();
        #Student::factory(4)->create();


        /*FACTORY
        Course::factory(10)->create();
        Module::factory(20)->create();
        Note::factory(5)->create();
        Questionnaire::factory(5)->create();
        Certificate::factory(4)->create();
        */
    }
}
