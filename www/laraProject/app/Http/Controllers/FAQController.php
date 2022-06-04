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
    
 public function faqupdate(Request $request)
    { 
        $this->validate($request, [
        
        'nuova_domanda'       => 'max:50',
        'nuovo_risposta'     => 'max:100',
        
      ]);
        // $xfaq= ; 
    }
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
 
    

    
}