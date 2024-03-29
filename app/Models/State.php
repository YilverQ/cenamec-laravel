<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*Modelos*/
use App\Models\User;
use App\Models\Parishe;
use App\Models\Municipalitie;


class State extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Relationship. 
     * One to Many - Many to One
    **/
    public function municipalities ()
    {
        return $this->hasMany(Municipalitie::class);
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, Municipalitie::class);
    }
}
