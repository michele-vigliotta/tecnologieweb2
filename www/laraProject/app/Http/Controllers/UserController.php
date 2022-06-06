<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use Validator;
  use Auth;
  use Session;
  use App\User;
  use Illuminate\Support\Facades\Hash;

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
         if(('Locatore'==(Auth::user()->tipo)||'Locatario'==(Auth::user()->tipo))){  
            return redirect()->to('/homeutente');
         }
         elseif('admin'==(Auth::user()->tipo)){
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

    public function profileedit(){
      return view('profileedit');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
        'password_attuale'   => 'required|alphaNum|min:3',
        'nuovo_numero'       => 'min:10|max:10',
        'nuovo_prefisso'     => 'min:2|max:3',
        'nuovo_c_fiscale'    => 'min:16|max:16',
      ]);
        $user = User::find(auth()->user()->id);
        if(Hash::check($request->password_attuale, $user->password)){
            Auth::user()->nome = request('nuovo_nome');
            Auth::user()->cognome = request('nuovo_cognome');
            Auth::user()->username = request('nuovo_username');
            if (($request->nuova_password)){
                if($request->nuova_password == $request->conferma_password){
                    Auth::user()->password = request('nuova_password');
                }else {
                    return back()->with('error', 'Le due password inserite non coincidono!');
                }
            }
            Auth::user()->email = request('nuova_email');
            if (($request->nuova_data_nascita)){
                Auth::user()->data_nascita = request('nuova_data_nascita');
            }
            Auth::user()->c_fiscale = request('nuovo_c_fiscale');
            Auth::user()->prefisso = request('nuovo_prefisso');
            Auth::user()->numero = request('nuovo_numero');

            Auth::user()->save();

            return redirect()->to('/profile');
        }else{
           return back()->with('error', 'Password errata!');
        }
    }
  }

 ?>
