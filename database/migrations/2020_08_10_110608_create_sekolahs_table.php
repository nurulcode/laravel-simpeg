<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->constrained('pegawais')->onDelete('cascade');
            $table->string('tingakt', 100)->nullable();
            $table->string('nama_sekolah', 100)->nullable();
            $table->string('lokasi', 100)->nullable();
            $table->foreignId('pendidikan_id')->constrained('pendidikans')->onDelete('cascade');
            $table->string('nomor', 100)->nullable()->default('-');
            $table->date('tgl_ijazah');
            $table->string('rektor', 100)->nullable()->default('-');
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
        Schema::dropIfExists('sekolahs');
    }
}
