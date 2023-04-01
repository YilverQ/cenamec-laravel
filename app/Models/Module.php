<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Models\Note;
use App\Models\Questionnaire;
use App\Models\Student;


class Module extends Model
{
    use HasFactory;

    /**
     * protected $fillable  = [array_fields] : Para definir los campos que se pueden cargar.
     * protected $hidden    = [array_fields] : Para definir los campos que no son visibles.
    **/
    protected $fillable = [ 'name', 'level'];


    /**
     * Relationship. 
     * One to Many - Inverse
    **/
    public function teacher ()
    {
        return $this->belongsTo(Teacher::class);
    }


    /**
     * Relationship. 
     * One to Many - Many to One
    **/
    public function notes ()
    {
        return $this->hasMany(Note::class);
    }

    public function questionnaires ()
    {
        return $this->hasMany(Questionnaire::class);
    }


    /**
     * Relationship. 
     * Many to many
    **/
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
