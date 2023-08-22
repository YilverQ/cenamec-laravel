<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Aptitude extends Model
{
    use HasFactory;

    protected $fillable = [ 'title'];


    /**
     * Relationship. 
     * One to Many - Inverse
    **/
    public function course ()
    {
        return $this->belongsTo(Course::class);
    }
    
}
