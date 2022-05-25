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
        'tipo'             => 'required',
        'descrizione'      => 'required|alphaNum|max:500',
        'inizio_locazione' => 'required',
        'fine_locazione'   => 'required',
        'citta'            => 'required',
        'stato'            => 'required',
        'indirizzo'        => 'required',
        'canone'           => 'required',
        'genere'           => 'required',
        'n_posti_letto'    => 'required'
      ]);

      $var=[
        "servizio1" => $request->servizio1,
        "servizio2" => $request->servizio2,
        "servizio3" => $request->servizio3
      ];

      Storage::disk('public')->put('service.json', json_encode($var));

      $annuncio=new annuncio;
      $annuncio->id_locatore=Auth::user()->id;
      $annuncio->tipo=$request->tipo;
      $annuncio->descrizione=$request->descrizione;
      $annuncio->stato=$request->stato;
      $annuncio->citta=$request->citta;
      $annuncio->CAP=$request->CAP;
      $annuncio->indirizzo=$request->indirizzo;
      $annuncio->inizio_locazione=$request->inizio_locazione;
      $annuncio->fine_locazione=$request->fine_locazione;
      $annuncio->genere_locatario=$request->genere;
      $annuncio->canone_affitto=$request->canone;
      $annuncio->numero_camere=$request->n_camere;
      $annuncio->posti_letto_totali=$request->n_posti_letto;
      $annuncio->servizi_offerti=Storage::disk('public')->get('service.json');
      $annuncio->save();

      $id=DB::table('annuncio')->latest('created_at')->first();

      $val=$request->mainImg->store('/'.$id->id_annuncio,['disk'=>'my_files']);
      echo($val);
      DB::table('annuncio')->where('id_annuncio',$id->id_annuncio)->update(['mainImg'=>$val]);

      foreach ($request->file('images') as $file){
        $image= new foto;
        $path= $file->store('immaginiAnnunci/'.$id->id_annuncio, ['disk'=>'my_files']);
        $image->url=$path;
        $image->id_annuncio=$id->id_annuncio;
        $image->save();
      }
    }

    public function aggiungiAnnuncio(){
      return view('prova');
    }

    public function filterCatalog(Request $request){
      $query="select * from annuncio ";
      if($request->filled('citta'))
        $query.="where citta='".$request->citta."' ";

      $annunci=DB::select($query);
      return view('catalogo', ['annunci'=>$annunci]);
    }

    public function catalogo(){
      $annunci=DB::select('select * from annuncio');
      return view('catalogo', ['annunci'=>$annunci]);
    }

    public function dettagli(){
      return view('prova');
    }


}
