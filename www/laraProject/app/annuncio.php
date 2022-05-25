<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class annuncio extends Model
{
    protected $table = 'annuncio';

    protected $fillable = [
      'id_locatore', 'descrizione', 'stato', 'citta', 'indirizzo',
      'inizio_locazione', 'fine_locazione', 'genere_locatario',
      'canone_affitto', 'status', 'servizi_offerti',
      'tipo', 'numero_camere', 'posti_letto_totali'
    ];

    public function image(){
      return $this->hasMany('App\foto', 'id_annuncio');
    }

    public function room(){
      return $this->hasOne('App\camere', 'id_annuncio');
    }
}
