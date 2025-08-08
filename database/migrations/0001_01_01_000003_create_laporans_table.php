<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->text('isi_laporan');
            $table->string('status')->default('Menunggu');
            $table->unsignedBigInteger('user_id');
            $table->string('kabupaten');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('laporans');
    }
}
