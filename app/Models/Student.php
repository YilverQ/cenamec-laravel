<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*Modelos*/
use App\Models\User;
use App\Models\Course;
use App\Models\Module;
use App\Models\Certificate;


class Student extends Model
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
     * One to Many - Many to One
    **/
    public function certificates ()
    {
        return $this->hasMany(Certificate::class);
    }


    /**
     * Relationship. 
     * Many to many
    **/
    public function courses ()
    {
        return $this->belongsToMany(Course::class, 
                                'course_student', 
                                'student_id', 
                                'course_id');
    }

    public function modulesWithPercentage ()
    {
        return $this->belongsToMany(Module::class)
                    ->withPivot('percentage');
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }
}
