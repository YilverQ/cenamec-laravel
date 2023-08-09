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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("firts_name");
            $table->string("second_name")->null();
            $table->string("lastname");
            $table->string("second_lastname")->null();
            $table->string("gender");
            $table->date("birthdate");
            $table->string("identification_card")->unique();
            $table->string("number_phone")->unique();
            $table->string("email")->unique();
            $table->string("password");
            $table->unsignedBigInteger('profileimg_id');
            $table->foreign('profileimg_id')
                            ->references('id')
                            ->on('profileimgs')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
            $table->unsignedBigInteger('parishe_id');
            $table->foreign('parishe_id')
                            ->references('id')
                            ->on('parishes')
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
        Schema::dropIfExists('users');
    }
};
