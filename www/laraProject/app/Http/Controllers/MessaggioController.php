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
        
     $query = "SELECT 'id' FROM utente WHERE username='".$request->destinatario."'";
     
     $id_destinatario = DB::select($query); 
     $testo = $request->input('testo');
     $id_mittente = Auth::user()->id;
     
     
        
    DB::insert('insert into messaggio (testo, id_mittente, id_destinatario) values (?, ?, ?)', [$testo, $id_mittente, $id_destinatario]);
    
    return redirect()->route('messaggi');
    }
    
    
    
    
    
    
    
    
    
    
    public function nuovomessaggio() {
        return view('nuovomessaggio');
        
    }
    
    
}