<?php



namespace App\Http\Controllers;


use App\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller{
    
 public function faqedit(){
      return view('faqedit');
    }

}