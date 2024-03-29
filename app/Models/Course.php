<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*Modelos*/
use App\Models\Module;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Certificate;


class Course extends Model
{
    use HasFactory;

    /**
     * protected $fillable  = [array_fields] : Para definir los campos que se pueden cargar.
     * protected $hidden    = [array_fields] : Para definir los campos que no son visibles.
    **/
    protected $fillable = [ 'name', 'img', 
                            'purpose', 'general_objetive', 
                            'specific_objetive', 'competence', 
                            'disabled'];

    /**
     * Relationship. 
     * Many to many
    **/
    public function teachers ()
    {
        return $this->belongsToMany(Teacher::class, 
                                'course_teacher', 
                                'course_id', 
                                'teacher_id');
    }


    public function students()
    {
        return $this->belongsToMany(Student::class);
    }


    /**
     * Relationship. 
     * One to Many - Many to One
    **/
    public function certificates ()
    {
        return $this->hasMany(Certificate::class);
    }

    public function modules ()
    {
        return $this->hasMany(Module::class);
    }
}
