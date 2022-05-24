<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAnnuncio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annuncio', function (Blueprint $table) {
            $table->increments('id_annuncio');
            $table->integer('id_locatore')->unsigned();
            $table->string('descrizione', 500);
            $table->date('inizio_locazione');
            $table->date('fine_locazione');
            $table->boolean('status')->default(1);
            $table->json('servizi_offerti');
            $table->timestamps();

            $table->foreign('id_locatore')->references('id')->on('utente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_annuncio');
    }
}
