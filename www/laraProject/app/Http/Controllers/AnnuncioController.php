<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\annuncio;
use App\foto;
use Auth;

class AnnuncioController extends Controller
{
    public function addAnnuncio(Request $request){
      $this->validate($request, [
        'descrizione' => 'required|alphaNum|max:500',
        'inizio_locazione' => 'required',
        'fine_locazione' => 'required',
      ]);

      $var=[
        "servizio1" => $request->servizio1,
        "servizio2" => $request->servizio2,
        "servizio3" => $request->servizio3
      ];

      Storage::disk('public')->put('service.json', json_encode($var));

      $annuncio=new annuncio;
      $annuncio->id_locatore=Auth::user()->id;
      $annuncio->descrizione=$request->descrizione;
      $annuncio->inizio_locazione=$request->inizio_locazione;
      $annuncio->fine_locazione=$request->fine_locazione;
      $annuncio->servizi_offerti=Storage::disk('public')->get('service.json');
      $annuncio->save();

      $id=DB::table('annuncio')->latest('created_at')->first();

      foreach ($request->file('images') as $file){
        $image= new foto;
        $path= $file->store('/'.$id->id_annuncio, ['disk'=>'my_files']);
        $image->url=$path;
        $image->id_annuncio=$id->id_annuncio;
        $image->save();
      }
    }

    public function prova(){
      return view('prova');
    }

}
