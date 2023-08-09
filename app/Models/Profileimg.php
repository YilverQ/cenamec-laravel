<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profileimg extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 
                            'url'];

    /**
     * Relationship. 
     * One to Many - Many to One
    **/
    public function users ()
    {
        return $this->hasMany(User::class);
    }
}
