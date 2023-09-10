<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('module_student', function (Blueprint $table) {
            $table->id();
            $table->string("state")->default("inactive");
            $table->integer("percentage")->default("0");
            $table->unsignedBigInteger('module_id');
            $table->foreign('module_id')
                            ->references('id')
                            ->on('modules')
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
        Schema::dropIfExists('module_student');
    }
};
