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
          $table->string('nome',50);
          $table->string('cognome',50);
          $table->string('email',50)->unique();
          $table->date('data_nascita');
          $table->string('c_fiscale',17);
          $table->string('numero',11);
          $table->string('prefisso',3);
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
