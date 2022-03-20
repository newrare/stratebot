<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('login', 100)->unique();
            $table->string('password');
            $table->string('email');
            $table->boolean('emailIsValid');
            $table->char('socialNetwork', 50);
            $table->string('urlAvatar')->nullable();
            $table->date('dateRegistration');
            $table->char('lang', 2);
            $table->boolean('isAdmin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
