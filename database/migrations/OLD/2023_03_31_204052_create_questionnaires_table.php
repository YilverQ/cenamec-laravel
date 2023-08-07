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
     * 
     * Relationship.
     * $table->unsignedBigInteger('relationship_name_id');
     * $table->foreign('relationship_name_id) : Para relacionar con una tabla.
     * ->references('nombre_id_tabla')
     * ->on('tabla_que_relaciona') : Nombre de la tabla que se relaciona.
     * ->onDelete('cascade') : Definimos eliminación en cascada.
     * ->onUpdate('') : Definimos actualización en cascada.
     */
    public function up(): void
    {
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->id();
            $table->string("ask");
            $table->string("answer");
            $table->string("bad1");
            $table->string("bad2");
            $table->string("bad3");
            $table->integer("level");
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')
                            ->references('id')
                            ->on('teachers')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
            $table->unsignedBigInteger('module_id');
            $table->foreign('module_id')
                            ->references('id')
                            ->on('modules')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionnaires');
    }
};
