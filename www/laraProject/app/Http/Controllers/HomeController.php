<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\DB;
  use Auth;

  class HomeController extends Controller{

    public function welcome(){
      return view('welcome');
    }

    public function index(){
      return view('index');
    }

    public function about(){
      return view('about');
    }

    public function why(){
      return view('why');
    }

    public function catalogo(){
      return view('catalogo');
    }


    public function faq(){
      $faq=DB::select('select * from faq');
      return view('faq', ['faq'=>$faq]);
    }

	  public function login(){
      return view('login');
    }

    public function signup(){
      return view('signup');
    }

    public function homeutente(){
      return view('homeutente');
    }

     public function profile(){
      return view('profile');
    }
    public function profileupdate(){
      return view('profileupdate');
    }

    public function provanavbar(){
      return view('provanavbar');
    }
    public function annunci(){
        $query="select * from annuncio where id_locatore='".Auth::user()->id."'";
        $annunci=DB::select($query);
        return view('annunci', ['annunci'=>$annunci]);
    }
    public function stats(){
        return view('stats');
    }
    public function chat(){
        $query="select * from messaggio where id_destinatario='".Auth::user()->id."'";
        $messaggi=DB::select($query);
        
        $query="select * from utente";
        $utenti = DB::select($query);
        echo '<pre>'; print_r($messaggi); echo '</pre>';
        view('messaggi', ['messaggi'=>$messaggi,'utenti'=>$utenti]);
    }
      
     

  }

 ?>
