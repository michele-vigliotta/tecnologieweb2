<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessaggioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messaggio', function (Blueprint $table) {
            $table->increments('id_messaggio');
            $table->integer('id_mittente')->unsigned();
            $table->integer('id_destinatario')->unsigned();
            $table->string('testo', 200);
            $table->dateTime('timestamp');
            $table->timestamps();
            
            $table->foreign('id_mittente')->references('id')->on('utente');
            $table->foreign('id_destinatario')->references('id')->on('utente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messaggio');
    }
}
