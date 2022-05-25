<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class camera extends Model
{

  protected $table="camera";

  protected $fillable=[
    'posti_letto', 'dimensione', 'disponiblita_angolo_studio',
    'id_annuncio'
  ];


  public function annuncio(){
    return $this->belongsTo('App\annuncio', 'id_annuncio');
  }
}
