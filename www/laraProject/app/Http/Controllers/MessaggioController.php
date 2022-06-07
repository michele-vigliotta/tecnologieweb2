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
    
    
    
    /*
     public function sendMessage(Request $request)
    {
        // Do the validation...

        // Send the message from the current user to the user with ID of 1,
        // You probably always want the current logged-in user as the sender.
        // We talk about the recipient later...
        //
         
         $query = "SELECT 'id' FROM utente WHERE username='".$request->destinatario."'";
         
        $id_destinatario = DB::select($query);
         
        Auth::user()->sent()->create([
            'testo'       => $request->testo,
            'id_destinatario' =>  $id_destinatario,
            'id_mittente' => Auth::user()->id
        ]);   
        return redirect()->route('messaggi');
        // Set flash message, render view, etc...
    }
    */
    
    
    public function sendMessage(Request $request){
        
     $query = "SELECT id FROM utente WHERE username='".$request->destinatario."'";
     $id = DB::select($query);
     $id_destinatario = $id[0]->id; 
     $testo = $request->input('messaggio');
     $id_mittente = Auth::user()->id;
     date_default_timezone_set('Europe/Rome');
     $timestamp = date('y-m-d  H:i:s');
     
        
    DB::insert('insert into messaggio (testo, id_mittente, id_destinatario, timestamp) values (?, ?, ?, ?)', [$testo, $id_mittente, $id_destinatario, $timestamp]);
    
    return redirect()->route('messaggi');
     
    }
    
    
    
    
    
    
    
    
    
    
    public function nuovomessaggio() {
        return view('nuovomessaggio');
        
    }
    
    
}