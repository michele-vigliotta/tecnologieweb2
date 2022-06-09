<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\annuncio;
use App\foto;
use Auth;
use Illuminate\Support\Facades\Session;

class PrenotazioneController extends Controller
{
    public function prenota(Request $request){
     $id_locatario= Auth::user()->id;
     $username_locatario=Auth::user()->username;
     date_default_timezone_set('Europe/Rome');
     $data_prenotazione = date('y-m-d  H:i:s');
     DB::insert('insert into prenotazione (id_locatario, username_locatario, data_prenotazione, id_annuncio) values (?, ?, ?, ?)', [$id_locatario, $username_locatario, $data_prenotazione, $request->id_annuncio]);
     
     return redirect()->back();
    }
    
    public function richieste(Request $request){
     $query="select * from prenotazione where id_annuncio='".$request->id_annuncio."' and confermata='1'" ;
     $richiesteattive=DB::select($query);
     $query2="select * from prenotazione where id_annuncio='".$request->id_annuncio."' and confermata='0'" ;
     $richiesteconfermate=DB::select($query2);
     $query3="select * from utente";
     $utenti=DB::select($query3);
     return view('richieste', ['richiesteattive'=>$richiesteattive, 'richiesteaccettate'=>$richiesteconfermate, 'utenti'=>$utenti]);
    }
    
    public function confermaprenotazione(Request $request){
     DB::update('update annuncio set status = ? where id_annuncio = ?',[0,$request->id_annuncio]);
     
     DB::update('update prenotazione set confermata = ? where id_prenotazione = ?',[0,$request->id_prenotazione]);
     
     date_default_timezone_set('Europe/Rome');
     $timestamp = date('y-m-d  H:i:s');
     DB::update('update prenotazione set data_conferma = ? where id_prenotazione = ?',[$timestamp,$request->id_prenotazione]);
     
     DB::delete("delete from prenotazione where id_annuncio='".$request->id_annuncio."' and confermata='1'");
     
    return redirect()->route('richieste', ['id_annuncio'=>$request->id_annuncio]);
    }
    
    public function eliminaprenotazione(Request $request) {
    DB::delete('delete from prenotazione where id_prenotazione = ?',[$request->id_prenotazione]);
    return redirect()->route('richieste');
}
      
}
