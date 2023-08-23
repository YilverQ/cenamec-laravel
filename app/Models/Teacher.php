<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*Modelos*/
use App\Models\User;
use App\Models\Note;
use App\Models\Course;
use App\Models\Module;
use App\Models\Questionnaire;


class Teacher extends Model
{
    use HasFactory;

    /**
     * protected $fillable  = [array_fields] : Para definir los campos que se pueden cargar.
     * protected $hidden    = [array_fields] : Para definir los campos que no son visibles.
    **/
    protected $fillable = [];
                            

    /**
     * Relationship. 
     * One to Many - Inverse
    **/
    public function user ()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Relationship. 
     * Many to many
    **/
    public function courses ()
    {
        return $this->belongsToMany(Course::class, 
                                'course_teacher', 
                                'teacher_id', 
                                'course_id');
    }


    /**
     * Relationship. 
     * One to Many - Many to One
    **/
    public function modules ()
    {
        return $this->hasMany(Module::class);
    }

    public function notes ()
    {
        return $this->hasMany(Note::class);
    }

    public function questionnaires ()
    {
        return $this->hasMany(Questionnaire::class);
    }
}
