<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class foto extends Model
{
    protected $table="foto";

    protected $fillable=[
      'url', 'id_annuncio'
    ];

    public function annuncio(){
      return $this->belongsTo('App\annuncio', 'id_annuncio');
    }
}
