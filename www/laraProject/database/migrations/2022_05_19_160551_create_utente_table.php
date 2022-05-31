<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utente', function (Blueprint $table) {
          $table->increments('id');
          $table->string('username',15)->unique();
          $table->string('password',75);
          $table->string('nome',50)->nullable();
          $table->string('cognome',50)->nullable();
          $table->string('email',50)->unique()->nullable();
          $table->date('data_nascita')->nullable();
          $table->string('c_fiscale',17)->nullable();
          $table->string('numero',11)->nullable();
          $table->string('prefisso',3)->nullable();
          $table->string('tipo',15);
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
        Schema::dropIfExists('utente');
    }
}
