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
