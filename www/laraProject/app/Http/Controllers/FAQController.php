<?php



namespace App\Http\Controllers;


use App\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller{
    
 public function faqedit(Request $request){
     $query="select * from faq where id_FAQ='".$request->id."'";
     
     $xfaq=DB::select($query);
     
     
     return view('faqedit', ['FAQ'=>$xfaq]);
    }

    
    /*
  public function dettagli(Request $request){
      $query="select * from annuncio where id_annuncio='".$request->id."'";
      $query2="select * from foto where id_annuncio='".$request->id."'";
      $annuncio=DB::select($query);
      $photo=DB::select($query2);
      return view('dettagli', ['annuncio'=>$annuncio, 'photo'=>$photo]);
    }
     * */
    
}