<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class RegistrationController extends Controller
{
    public function create(){
      return view('registration.create');
    }

    public function store(Request $request){
      $this->validate($request, [
        'username'      => 'required|max:15|unique:utente',
        'password'      => 'required|alphaNum|min:3',
        'nome'          => 'required|max:50',
        'cognome'       => 'required|max:50',
        'email'         => 'required|email|unique:utente',
        'data_nascita'  => 'required',
        'c_fiscale'     => 'required|max:16',
        'prefisso'      => 'required|min:2|max:2',
        'numero'        => 'required|min:10|max:10',
        'tipo'          => 'required',
      ]);

      $user = User::create(request(['username', 'password', 'nome', 'cognome', 'email', 'data_nascita', 'c_fiscale', 'numero', 'prefisso', 'tipo']));

      $user_data = array(
         'username'  => $request->get('username'),
         'password' => $request->get('password')
       );

      if(Auth::attempt($user_data, $remember=true))
        return redirect()->to('/homeutente');
      }
}
