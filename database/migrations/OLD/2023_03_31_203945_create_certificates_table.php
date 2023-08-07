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
     * ->date(nombre_campo)   : Definimos un campo de tipo fecha.
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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->date("date_certificate");
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')
                            ->references('id')
                            ->on('courses')
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
        Schema::dropIfExists('certificates');
    }
};
