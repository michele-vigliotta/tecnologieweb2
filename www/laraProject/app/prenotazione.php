<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prenotazione extends Model
{
    protected $table="prenotazione";

    protected $fillable=[
      'id_locatario',
      'username_locatario',
      'data_prenotazione',
      'id_annuncio'
    ];

}
