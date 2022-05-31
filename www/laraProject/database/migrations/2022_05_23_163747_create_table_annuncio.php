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
            $table->increments('id_annuncio')->index();
            $table->integer('id_locatore')->unsigned();
            $table->string('descrizione', 500);
            $table->string('stato', 50);
            $table->string('citta', 50);
            $table->string('CAP', 8);
            $table->string('indirizzo', 30);
            $table->integer('dimensione');
            $table->date('inizio_locazione');
            $table->date('fine_locazione');
            $table->string('genere_locatario', 15);
            $table->boolean('is_camera');
            $table->boolean('disponilita_angolo_studio')->nullable();
            $table->integer('posti_camera')->nullable();
            $table->integer('canone_affitto');
            $table->boolean('status')->default(1);
            $table->json('servizi_offerti');
            $table->string('mainImg', 150)->nullable();
            $table->string('tipo', 15);
            $table->integer('numero_camere');
            $table->integer('posti_letto_totali');
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
