<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;

class Administrator extends Model
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
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
