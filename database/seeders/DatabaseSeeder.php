<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Note;
use App\Models\State;
use App\Models\Course;
use App\Models\Module;
use App\Models\Parishe;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Profileimg;
use App\Models\Certificate;
use App\Models\Questionnaire;
use App\Models\Municipalitie;
use App\Models\Administrator;


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

        $this->call(StateSeeder::class);
        $this->call(MunicipalitieSeeder::class);
        $this->call(ParisheSeeder::class);
        $this->call(ProfileimgSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AdministratorSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(StudentSeeder::class);

        //Usuarios - Hombres
        $randomNumberA = rand(20, 50);
        for ($i=0; $i < $randomNumberA; $i++) { 
            User::factory(1)->create([
                'firts_name'        => fake()->firstNameMale(),
                'second_name'       => fake()->firstNameMale(),
                'lastname'          => fake()->lastName(),
                'second_lastname'   => fake()->lastName(),
                'gender'            => 'Masculino',
                'birthdate'         => fake()->date(),
                'identification_card' => fake()->unique()->numberBetween($min = 10000000, $max = 18000000),
                'number_phone'      => fake()->unique()->e164PhoneNumber(),
                'email'             => fake()->unique()->safeEmail(),
                'password'          => "root",
                'profileimg_id'     => fake()->numberBetween($min = 1, $max = 34),
                'parishe_id'        => fake()->numberBetween($min = 300, $max = 700)
            ]);
            // code...
        }

        $randomNumberB = rand(20, 50);
        for ($i=0; $i < $randomNumberB; $i++) { 
            User::factory(1)->create([
                'firts_name'        => fake()->firstNameFemale(),
                'second_name'       => fake()->firstNameFemale(),
                'lastname'          => fake()->lastName(),
                'second_lastname'   => fake()->lastName(),
                'gender'            => 'Femenino',
                'birthdate'         => fake()->date(),
                'identification_card' => fake()->unique()->numberBetween($min = 20000000, $max = 38000000),
                'number_phone'      => fake()->unique()->e164PhoneNumber(),
                'email'             => fake()->unique()->safeEmail(),
                'password'          => "root",
                'profileimg_id'     => fake()->numberBetween($min = 1, $max = 34),
                'parishe_id'        => fake()->numberBetween($min = 300, $max = 700)
            ]);
        }


        $sumRandomNumber = $randomNumberA + $randomNumberB; 
        for ($i=9; $i < $sumRandomNumber ; $i++) { 
            Student::factory(1)->create([
                'user_id'=> $i,
            ]);
        }


        $this->call(CourseSeeder::class);
        $this->call(CourseTeacherSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(NoteSeeder::class);
        $this->call(QuestionnaireSeeder::class);
        #$this->call(CertificateSeeder::class);


        //$this->call(CourseStudentSeeder::class);
        #Administrator::factory(2)->create();
        #Teacher::factory(8)->create();
        /*FACTORY
        Course::factory(10)->create();
        Module::factory(20)->create();
        Note::factory(5)->create();
        Questionnaire::factory(5)->create();
        Certificate::factory(4)->create();
        */
    }
}
