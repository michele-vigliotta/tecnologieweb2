<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\DB;

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
      $FAQ=DB::select('select * from FAQ');
      return view('faq', ['FAQ'=>$FAQ]);
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

  }

 ?>
