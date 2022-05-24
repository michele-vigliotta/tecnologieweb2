<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class annuncio extends Model
{
    protected $table = 'annuncio';

    protected $fillable = [
      'id_locatore', 'descrizione', 'inizio_locazione', 'fine_locazione',
      'status', 'servizi_offerti'
    ];

    public function image(){
      return $this->hasMany('App\foto', 'id_annuncio');
    }
}
