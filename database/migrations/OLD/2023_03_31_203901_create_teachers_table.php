<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * $table->tipo_campo('nombre_campo')->unique()->nulleable().
     * ->unique : Define un campo único. 
     * ->nulleable : Define un campo null.
     * ->string(nombre_campo, 0) : Definimos la cantidad de caracteres.
     */
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("lastname");
            $table->string("identification_card")->unique();
            $table->string("number_phone")->unique();
            $table->string("email")->unique();
            $table->string("password");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
