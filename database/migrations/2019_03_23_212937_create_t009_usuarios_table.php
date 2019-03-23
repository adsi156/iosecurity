<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateT009UsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t009_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('f009_nombre');
            $table->string('f009_documento')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('f009_imagen')->default('');
            $table->string('f009_celular')->default('');
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
        Schema::dropIfExists('t009_usuarios');
    }
}
