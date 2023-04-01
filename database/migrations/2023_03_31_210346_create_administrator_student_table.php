<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * $table->tipo_de_campo('nombre_del_campo')->unique()->nulleable().
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
        Schema::create('administrator_student', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('administrator_id');
            $table->foreign('administrator_id')
                            ->references('id')
                            ->on('administrators')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')
                            ->references('id')
                            ->on('students')
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
        Schema::dropIfExists('administrator_student');
    }
};
