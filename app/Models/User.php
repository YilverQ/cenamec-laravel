<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Parishe;

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
}
