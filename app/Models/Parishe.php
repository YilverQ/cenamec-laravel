<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Municipalitie;
use App\Models\User;

class Parishe extends Model
{
    use HasFactory;

    protected $fillable = [ 'name'];

    /**
     * Relationship. 
     * One to Many - Inverse
    **/
    public function municipalitie ()
    {
        return $this->belongsTo(Municipalitie::class);
    }

    /**
     * Relationship. 
     * One to Many - Many to One
    **/
    public function users ()
    {
        return $this->hasMany(User::class);
    }
}
