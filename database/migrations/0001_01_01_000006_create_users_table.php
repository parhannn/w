<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); 
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->string('plain_password')->nullable();
            $table->rememberToken(); 
            $table->timestamps();
            $table->string('role', 255)->default('dpc');
            $table->string('kabupaten', 255)->nullable();
            $table->unsignedBigInteger('kabupaten_id')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
