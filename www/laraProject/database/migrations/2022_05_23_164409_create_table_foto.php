<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto', function (Blueprint $table) {
            $table->increments('id_foto');
            $table->string('url', 150);
            $table->integer('id_annuncio')->unsigned();
            $table->timestamps();

            $table->foreign('id_annuncio')->references('id_annuncio')->on('annuncio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_foto');
    }
}
