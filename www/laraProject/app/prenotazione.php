<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prenotazione extends Model
{
    protected $table="prenotazione";

    protected $fillable=[
      'id_locatario'
    ];

}
