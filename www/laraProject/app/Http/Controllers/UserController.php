<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use Validator;
  use Auth;
  use Session;

  class UserController extends Controller{

    public function checkLogin(Request $request){
      $this->validate($request, [
        'username'   => 'required|string|max:15',
        'password'  => 'required|alphaNum|min:3'
      ]);
      $user_data = array(
         'username'  => $request->get('username'),
         'password' => $request->get('password')
       );

       if(Auth::attempt($user_data, $remember=true)){
         if(('Locatore'==(Auth::user()->tipo)||'locatario'==(Auth::user()->tipo))){  
            return redirect()->to('/homeutente');
         }
         elseif('admin'==(Auth::user()->tipo)||'locatario'==(Auth::user()->tipo)){
             return redirect()->to('/homeadmin');
         }
         
       }else{
         return back()->with('error', 'Username e/o password errati!');
       }
    }


    public function homeutente(){
      return view('homeutente');
    }
    public function homeadmin(){
      return view('homeadmin');
    }
    public function profile(){
      return view('profile');
    }

  }

 ?>
