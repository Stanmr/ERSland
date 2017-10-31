<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('telefono')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('clave_unica')->unique();;
            $table->string('foto_url')->nullable();
            $table->integer('tipo');
            $table->text('descripcion')->nullable();
            $table->string('foto_id');
            #$table->integer('equipo_id')->unsigned()->nullable();
            #$table->foreign('equipo_id')->references('id')->on('equipos');
            $table->rememberToken();
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
}
