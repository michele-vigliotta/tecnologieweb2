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
        'citta' => 'required',
        'stato' => 'required',
        'indirizzo' => 'required',
        'canone' => 'required',
        'genere' => 'required',
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
      $annuncio->stato=$request->stato;
      $annuncio->citta=$request->citta;
      $annuncio->CAP=$request->CAP;
      $annuncio->indirizzo=$request->indirizzo;
      $annuncio->inizio_locazione=$request->inizio_locazione;
      $annuncio->fine_locazione=$request->fine_locazione;
      $annuncio->genere_locatario=$request->genere;
      $annuncio->canone_affitto=$request->canone;
      $annuncio->servizi_offerti=Storage::disk('public')->get('service.json');
      $annuncio->save();

      $id=DB::table('annuncio')->latest('created_at')->first();

      $val=$request->mainImg->store('/immaginiAnnunci/images'.$id->id_annuncio,['disk'=>'my_files']);
      DB::table('annuncio')->where('id_annuncio',$id->id_annuncio)->update(['mainImg'=>$val]);

      foreach ($request->file('images') as $file){
        $image= new foto;
        $path= $file->store('/immaginiAnnunci/images/'.$id->id_annuncio, ['disk'=>'my_files']);
        $image->url=$path;
        $image->id_annuncio=$id->id_annuncio;
        $image->save();
      }
    }

    public function aggiungiAnnuncio(){
      return view('prova');
    }

    public function catalogo(){
      $annunci=DB::select('select * from annuncio');
      return view('catalogo', ['annunci'=>$annunci]);
    }

    public function dettagli(){
      return view('prova');
    }


}
