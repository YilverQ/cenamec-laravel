<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Certificate;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Module;


class Course extends Model
{
    use HasFactory;

    /**
     * protected $fillable  = [array_fields] : Para definir los campos que se pueden cargar.
     * protected $hidden    = [array_fields] : Para definir los campos que no son visibles.
    **/
    protected $fillable = [ 'name', 'description', 'img'];


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
     * Many to many
    **/
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
