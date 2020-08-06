<?php

use App\Enums\Agama;
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
            $table->string('nama_lengkap', 100);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jk');
            $table->tinyInteger('agama')->default(Agama::Lain);
            $table->string('phone')->nullable();
            $table->text('alamat')->nullable();
            $table->string('foto')->nullable()->default('default.png');
            $table->string('file')->nullable();
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
