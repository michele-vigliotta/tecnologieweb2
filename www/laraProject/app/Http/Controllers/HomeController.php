<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;

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

	  public function testimonial(){
      return view('testimonial');
    }
      public function faq(){
          return view('faq');
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
