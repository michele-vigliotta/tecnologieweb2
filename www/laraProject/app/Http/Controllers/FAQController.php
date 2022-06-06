<?php



namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;
use App\FAQ;
use Illuminate\Http\Request;


class FAQController extends Controller{
    
    
    
    //ritorna vista per inserire una nuova faq
    public function faqadd() {
        return view('faqadd');
    }   
    
    //salva nel db la nuova faq
    public function faqsave(Request $request) 
    {
        $domanda = $request->input('domanda');
        $risposta = $request->input('risposta');
        
       DB::insert('insert into faq (domanda, risposta) values (?, ?)', [$domanda, $risposta]);
       return redirect()->route('faq');
    }
    
    
    
    
  //ritorna vista per la modifica  
 public function faqedit(Request $request){
     $query="select * from faq where id_FAQ='".$request->id."'";
     
     $xfaq=DB::select($query);
     
     
     return view('faqedit', ['xfaq'=>$xfaq]);
    }
    

    
   //salva dati modificati 
public function faqupdate(Request $request)
{
    $domanda = $request->input('nuova_domanda');
    $risposta = $request->input('nuova_risposta');
    
    DB::update('update faq set domanda = ?, risposta=? where id_FAQ = ?',[$domanda,$risposta,$request->id]);
    return redirect()->route('faq');
    
}
  

    
    
    
    
    
   
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
 
    

    
}