<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Administrator;
use App\Models\Course;
use App\Models\Module;
use App\Models\Note;
use App\Models\Questionnaire;

class Teacher extends Model
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
    public function courses ()
    {
        return $this->hasMany(Course::class);
    }

    public function modules ()
    {
        return $this->hasMany(Modules::class);
    }

    public function notes ()
    {
        return $this->hasMany(Notes::class);
    }

    public function questionnaires ()
    {
        return $this->hasMany(Questionnaire::class);
    }
}
