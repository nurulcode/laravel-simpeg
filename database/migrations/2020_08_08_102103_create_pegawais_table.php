<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 50)->nullable()->default('-');
            $table->string('nama_lengkap', 100);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');

            $table->string('jenis_kelamin', 2);
            $table->string('agama', 20);
            $table->string('golongan_darah', 20)->nullable()->default('lain');
            $table->string('pernikahan', 20);
            $table->string('kepegawaian', 20);

            $table->date('tgl_naik_pangkat')->nullable();
            $table->date('tgl_naik_gaji')->nullable();

            $table->string('telfon', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->text('alamat', 100)->nullable();

            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('golongan_id')->constrained('golongans')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('gaji_id')->constrained('gajis')->onDelete('cascade')->onUpdate('cascade');


            $table->string('foto')->nullable()->default('fotos/default.png');
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
        Schema::dropIfExists('pegawais');
    }
}
