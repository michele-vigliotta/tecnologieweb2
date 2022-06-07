<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messaggio extends Model
{
    protected $table="messaggio";

    protected $fillable=[
      'id_mittente', 'id_destinatario', 'testo'
    ];

    // A message belongs to a sender
    public function mittente(){
      //return $this->belongsTo('App\User', 'id_mittente');
      return $this->belongsTo(User::class, 'id_mittente');
    }

    // A message also belongs to a receiver
    public function destinatario(){
      //return $this->belongsTo('App\User', 'id_destinatario');
      return $this->belongsTo(User::class, 'id_destinatario');
    }
}


/*
 $user->sent       // All messages sent by this user
$user->received   // All messages received by this user

App\User::has('sent')->get() // Retrieve all users that have at lest one sent message
App\User::has('sent', '>', 2)->get() 

$user->sent()->where('subject', 'Happy new year!')->first();
 */