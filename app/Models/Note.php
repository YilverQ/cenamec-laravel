<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Models\Module;


class Note extends Model
{
    use HasFactory;
    
    /**
     * protected $fillable  = [array_fields] : Para definir los campos que se pueden cargar.
     * protected $hidden    = [array_fields] : Para definir los campos que no son visibles.
    **/
    protected $fillable = [ 'img', 'description', 'level'];


    /**
     * Relationship. 
     * One to Many - Inverse
    **/
    public function teacher ()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function module ()
    {
        return $this->belongsTo(Module::class);
    }
}
