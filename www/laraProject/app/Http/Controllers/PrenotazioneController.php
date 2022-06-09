<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\annuncio;
use App\foto;
use Auth;

class PrenotazioneController extends Controller
{
    public function prenota(Request $request){
     $id_locatario= Auth::user()->id;
     date_default_timezone_set('Europe/Rome');
     $data_prenotazione = date('y-m-d  H:i:s');
     DB::insert('insert into prenotazione (id_locatario, data_prenotazione, id_annuncio) values (?, ?, ?)', [$id_locatario, $data_prenotazione, $request->id_annuncio]);
     
    return redirect()->route('catalogo');
    }
    
    public function richieste(Request $request){
     $query="select * from prenotazione where id_annuncio='".$request->id_annuncio."'";
     $richieste=DB::select($query);
     $query2="select * from utente";
     $utenti=DB::select($query2);
     return view('richieste', ['richieste'=>$richieste], ['utenti'=>$utenti]);
    }
    
    public function confermaprenotazione(Request $request){
     DB::update('update annuncio set status = ? where id_annuncio = ?',[0,$request->id_annuncio]);
     
     DB::update('update prenotazione set confermata = ? where id_prenotazione = ?',[0,$request->id_prenotazione]);
     
     DB::delete("delete from prenotazione where id_annuncio='".$request->id_annuncio."' and confermata='1'");
     
    return redirect()->route('richieste', ['id_annuncio'=>$request->id_annuncio]);
    }
    
    public function eliminaprenotazione(Request $request) {
    DB::delete('delete from prenotazione where id_prenotazione = ?',[$request->id_prenotazione]);
    return redirect()->route('richieste');
}
      
}
