<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Administrator;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\Module;

class Student extends Model
{
    use HasFactory;

    /**
     * protected $fillable  = [array_fields] : Para definir los campos que se pueden cargar.
     * protected $hidden    = [array_fields] : Para definir los campos que no son visibles.
    **/
    protected $fillable = [ 'name', 'lastname', 
                            'identification_card', 'number_phone',
                            'email', 'password'];
                            
    protected $hidden = ['password'];


    /**
     * Relationship. 
     * Many to many
    **/
    public function administrators()
    {
        return $this->belongsToMany(Administrator::class);
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
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }
}
