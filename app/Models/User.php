<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Parishe;
use App\Models\Profileimg;
use App\Models\Administrator;
use App\Models\Teacher;
use App\Models\Student;

class User extends Model
{
    use HasFactory;

    protected $fillable = [ 'firts_name', 
                            'second_name',
                            'lastname',
                            'second_lastname',
                            'gender',
                            'birthdate', 
                            'identification_card', 
                            'number_phone',
                            'email', 
                            'password'];

    protected $hidden = ['password'];


    /**
     * Relationship. 
     * One to Many - Inverse
    **/
    public function parishe ()
    {
        return $this->belongsTo(Parishe::class);
    }

    public function profileimg ()
    {
        return $this->belongsTo(Profileimg::class);
    }


    /**
     * Relationship. 
     * One to Many - Many to One
    **/
    public function administrator()
    {
        return $this->hasOne(Administrator::class);
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }
}
