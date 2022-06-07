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
        
       
        return view('messaggi', ['messaggimittente'=>$messaggimittente,'username'=>$request->username]);
        
    }
    
}