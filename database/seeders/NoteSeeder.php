<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Note;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*YILVER*/
        Note::create([
            'img' => 'url/img/1',
            'description' => "Aprender nunca fue tan fácil", 
            'level' => 1,
            'teacher_id'  => 1,
            'module_id'   => 1,
        ]);

        Note::create([
            'img' => 'url/img/2',
            'description' => "CENAMEC, un lugar para aprender sobre la ciencia",
            'level' => 2,
            'teacher_id'  => 1,
            'module_id'   => 1,
        ]);


        Note::create([
            'img' => 'url/img/3',
            'description' => "Aprender nunca fue tan fácil", 
            'level' => 1,
            'teacher_id'  => 1,
            'module_id'   => 2,
        ]);

        Note::create([
            'img' => 'url/img/4',
            'description' => "CENAMEC, un lugar para aprender sobre la ciencia", 
            'level' => 2,
            'teacher_id'  => 1,
            'module_id'   => 2,
        ]);

        Note::create([
            'img' => 'url/img/5',
            'description' => "Biología, Física y Química. Es lo que sabemos.", 
            'level' => 3,
            'teacher_id'  => 1,
            'module_id'   => 2,
        ]);


        Note::create([
            'img' => 'url/img/6',
            'description' => "Aprender nunca fue tan fácil", 
            'level' => 1,
            'teacher_id'  => 1,
            'module_id'   => 2,
        ]);

        Note::create([
            'img' => 'url/img/7',
            'description' => "CENAMEC, un lugar para aprender sobre la ciencia", 
            'level' => 2,
            'teacher_id'  => 1,
            'module_id'   => 3,
        ]);

        Note::create([
            'img' => 'url/img/8',
            'description' => "Biología, Física y Química. Es lo que sabemos.", 
            'level' => 3,
            'teacher_id'  => 1,
            'module_id'   => 3,
        ]);



        /*VANESSA*/
        Note::create([
            'img' => 'url/img/9',
            'description' => "Aprender nunca fue tan fácil", 
            'level' => 1,
            'teacher_id'  => 2,
            'module_id'   => 1,
        ]);

        Note::create([
            'img' => 'url/img/10',
            'description' => "CENAMEC, un lugar para aprender sobre la ciencia", 
            'level' => 2,
            'teacher_id'  => 2,
            'module_id'   => 1,
        ]);


        Note::create([
            'img' => 'url/img/11',
            'description' => "Aprender nunca fue tan fácil", 
            'level' => 1,
            'teacher_id'  => 2,
            'module_id'   => 2,
        ]);

        Note::create([
            'img' => 'url/img/12',
            'description' => "CENAMEC, un lugar para aprender sobre la ciencia",
            'level' => 2,
            'teacher_id'  => 2,
            'module_id'   => 2,
        ]);

        Note::create([
            'img' => 'url/img/13',
            'description' => "Biología, Física y Química. Es lo que sabemos.", 
            'level' => 3,
            'teacher_id'  => 2,
            'module_id'   => 2,
        ]);


        Note::create([
            'img' => 'url/img/14',
            'description' => "Aprender nunca fue tan fácil",
            'level' => 1,
            'teacher_id'  => 2,
            'module_id'   => 3,
        ]);

        Note::create([
            'img' => 'url/img/15',
            'description' => "CENAMEC, un lugar para aprender sobre la ciencia", 
            'level' => 2,
            'teacher_id'  => 2,
            'module_id'   => 3,
        ]);

        Note::create([
            'img' => 'url/img/16',
            'description' => "Biología, Física y Química. Es lo que sabemos.", 'level' => 3,
            'teacher_id'  => 2,
            'module_id'   => 3,
        ]);
    }
}
