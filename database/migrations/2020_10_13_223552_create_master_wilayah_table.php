<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterWilayahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinsis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
        });

        Schema::create('kabupatens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('provinsi_id')->unsigned();
            $table->string('nama');
            $table->timestamps();

            $table->foreign('provinsi_id')
                  ->references('id')
                  ->on('provinsis')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });

        Schema::create('kecamatans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kabupaten_id')->unsigned();
            $table->string('nama');
            $table->timestamps();

            $table->foreign('kabupaten_id')
                  ->references('id')
                  ->on('kabupatens')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });

        Schema::create('kelurahans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kecamatan_id')->unsigned();
            $table->string('nama');
            $table->timestamps();

            $table->foreign('kecamatan_id')
                  ->references('id')
                  ->on('kecamatans')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelurahans');

        Schema::dropIfExists('kecamatans');

        Schema::dropIfExists('kabupatens');

        Schema::dropIfExists('provinsis');
    }
}
