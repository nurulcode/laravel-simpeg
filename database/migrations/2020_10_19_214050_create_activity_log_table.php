<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityLogTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::connection(config('activitylog.database_connection'))->create(config('activitylog.table_name'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('log_name')->nullable();
            $table->text('description');
            $table->nullableMorphs('subject', 'subject');
            $table->nullableMorphs('causer', 'causer');
            $table->json('properties')->nullable();
            $table->timestamps();
            $table->index('log_name');
        });

            // Example polumorphic
            // table_post, table_portofolio, table_comment
            // setiap yang melakukan comment di post atau portofolio akan tersimpan tersimpan di table_comment

            // create table comment
            // Schema::create('commenets', function(Blueprint $table) {
            //     $table->integer('id');
            //     // user id yang melakukan action comment (user: 1000)
            //     $table->integer('user_id')->unsigned();
            //     $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            //     // content
            //     $table->text('content')->nullable();
            //     // ini id table = table_post atau table_portofolio.
            //     $table->integer('commentable_id')->unsigned();
            //     // ini type Model atau Model yang di pakai relasi, App\Post atau App\Portofolio.
            //     $table->integer('commentable_type');
            //     // (user 1000 memberikan comment pada type App\Post yang memiliki id = 1)

            // });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::connection(config('activitylog.database_connection'))->dropIfExists(config('activitylog.table_name'));
    }
}
