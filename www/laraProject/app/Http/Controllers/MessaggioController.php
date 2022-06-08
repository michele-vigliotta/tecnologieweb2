<?php



namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\messaggio;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Auth;

class MessaggioController extends Controller{
    
        
    public function sendMessage(Request $request){
        
     $query = "SELECT id FROM utente WHERE username='".$request->destinatario."'";
     $id = DB::select($query);
     $id_destinatario = $id[0]->id; 
     $testo = $request->input('messaggio');
     $id_mittente = Auth::user()->id;
     date_default_timezone_set('Europe/Rome');
     $timestamp = date('y-m-d  H:i:s');
     
        
    DB::insert('insert into messaggio (testo, id_mittente, id_destinatario, timestamp) values (?, ?, ?, ?)', [$testo, $id_mittente, $id_destinatario, $timestamp]);
    
    return redirect()->route('chat');
     
    }
    
    public function nuovomessaggio() {
        return view('nuovomessaggio');
        
    }
    
    public function aprichat(Request $request) {
        $query1="select * from messaggio where id_mittente='".$request->id."'";
        $messaggimittente=DB::select($query1);
        
        $query2="select * from messaggio where id_mittente='".Auth::user()->id."' and id_destinatario='".$request->id."'";
        $messaggidestinatario=DB::select($query2);
        
        return view('messaggi', ['messaggimittente'=>$messaggimittente,'messaggidestinatario'=>$messaggidestinatario,'username'=>$request->username]);
        
    }
    
    public function reply(Request $request) {
        
        $testo = $request->input('messaggio');
        $query1 ="select id from utente where username='".$request->username."'";
        $id = DB::select($query1);
        $id_destinatario = $id[0]->id;
        $id_mittente = Auth::user()->id;
        date_default_timezone_set('Europe/Rome');
        $timestamp = date('y-m-d  H:i:s');
        
        DB::insert('insert into messaggio (testo, id_mittente, id_destinatario, timestamp) values (?, ?, ?, ?)', [$testo, $id_mittente, $id_destinatario, $timestamp]);
    
        return redirect()->route('chat');
    }
}