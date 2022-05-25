<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messaggio extends Model
{
    protected $table="messaggio";

    protected $fillable=[
      'id_mittente', 'id_destinatario', 'testo'
    ];

    public function mittente(){
      return $this->belongsTo('App\User', 'id_mittente');
    }

    public function destinatario(){
      return $this->belongsTo('App\User', 'id_destinatario');
    }
}
