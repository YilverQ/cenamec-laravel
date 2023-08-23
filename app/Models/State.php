<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*Modelos*/
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
}
