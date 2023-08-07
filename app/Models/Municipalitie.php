<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;
use App\Models\Parishe;

class Municipalitie extends Model
{
    use HasFactory;

    protected $fillable = [ 'name'];

    /**
     * Relationship. 
     * One to Many - Inverse
    **/
    public function state ()
    {
        return $this->belongsTo(State::class);
    }

    /**
     * Relationship. 
     * One to Many - Many to One
    **/
    public function parishes ()
    {
        return $this->hasMany(Parishe::class);
    }
}
