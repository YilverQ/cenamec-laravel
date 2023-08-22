<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Models\Aptitude;
use App\Models\Objetive;

use App\Models\Certificate;
use App\Models\Student;
use App\Models\Module;


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
        return $this->belongsToMany(Teacher::class);
    }


    public function students()
    {
        return $this->belongsToMany(Student::class);
    }


    /**
     * Relationship. 
     * One to Many - Many to One
    **/
    public function aptitudes ()
    {
        return $this->hasMany(Aptitude::class);
    }

    public function objetives ()
    {
        return $this->hasMany(Objetive::class);
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
