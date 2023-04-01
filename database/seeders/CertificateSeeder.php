<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Certificate;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*YILVER*/
        Certificate::create([
            'date_certificate' => '01/01/2023',
            'course_id'  => 1,
            'student_id' => 1,
        ]);

        Certificate::create([
            'date_certificate' => '01/01/2023',
            'course_id'  => 2,
            'student_id' => 1,
        ]);

        Certificate::create([
            'date_certificate' => '01/01/2023',
            'course_id'  => 3,
            'student_id' => 1,
        ]);

        Certificate::create([
            'date_certificate' => '01/01/2023',
            'course_id'  => 4,
            'student_id' => 1,
        ]);


        /*VANESSA*/
        Certificate::create([
            'date_certificate' => '01/01/2023',
            'course_id'  => 1,
            'student_id' => 2,
        ]);

        Certificate::create([
            'date_certificate' => '01/01/2023',
            'course_id'  => 2,
            'student_id' => 2,
        ]);

        Certificate::create([
            'date_certificate' => '01/01/2023',
            'course_id'  => 3,
            'student_id' => 2,
        ]);

        Certificate::create([
            'date_certificate' => '01/01/2023',
            'course_id'  => 4,
            'student_id' => 2,
        ]);
    }
}
