<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->text('alamat');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->integer('kecamatan_id');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('jenis_disabilitas');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('anggotas');
    }
};
