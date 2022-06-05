<?php



namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;
use App\FAQ;
use Illuminate\Http\Request;


class FAQController extends Controller{
    
 public function faqedit(Request $request){
     $query="select * from faq where id_FAQ='".$request->id."'";
     
     $xfaq=DB::select($query);
     
     
     return view('faqedit', ['xfaq'=>$xfaq]);
    }
    
    /*
public function faqupdate(Request $request, $id)
    { 
    
        $xfaq = FAQ::find($id);
        $xfaq->domanda = $request->input('nuova_domanda');
        $xfaq->risposta = $request->input('nuova_risposta');
        $xfaq->update();
        return redirect('faq')->with('status', 'Faq modificata con successo');
    }
    */
    
    
public function faqupdate(Request $request, $id)
{
    $domanda = $request->input('nuova_domanda');
    $risposta = $request->input('nuova_risposta');
    
    DB::update('update faq set domanda = ?, risposta=? where id = ?',[$domanda,$risposta,$id]);
    
}
  

    
    
    
    
    
   
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
 
    

    
}