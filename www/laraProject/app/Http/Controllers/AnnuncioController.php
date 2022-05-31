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
        'descrizione'      => 'required|max:500',
        'inizio_locazione' => 'required|date',
        'fine_locazione'   => 'required|date|after_or_equal:start_date',
        'citta'            => 'required',
        'stato'            => 'required',
        'indirizzo'        => 'required',
        'canone'           => 'required',
        'genere'           => 'required',
        'dimensione'       => 'required',
        'n_posti_letto_totali'    => 'required'
      ]);

      $service=[
        "servizio1" => $request->servizio1,
        "servizio2" => $request->servizio2,
        "servizio3" => $request->servizio3,
        "servizio4" => $request->servizio4
      ];

      Storage::disk('public')->put('service.json', json_encode($service));

      $annuncio=new annuncio;
      $annuncio->id_locatore=Auth::user()->id;
      $annuncio->tipo=$request->tipo;
      $annuncio->descrizione=$request->descrizione;
      $annuncio->stato=$request->stato;
      $annuncio->citta=$request->citta;
      $annuncio->CAP=$request->CAP;
      $annuncio->indirizzo=$request->indirizzo;
      $annuncio->dimensione=$request->dimensione;
      $annuncio->inizio_locazione=$request->inizio_locazione;
      $annuncio->fine_locazione=$request->fine_locazione;
      $annuncio->genere_locatario=$request->genere;
      $annuncio->canone_affitto=$request->canone;
      $annuncio->posti_letto_totali=$request->n_posti_letto_totali;
      $annuncio->servizi_offerti=Storage::disk('public')->get('service.json');

      if($request->tipo=="camera"){
        $annuncio->id_camera="1";
        $annuncio->posti_camera=$request->n_posti_camera;
        $annuncio->disponilita_angolo_studio=$request->disponiblita_angolo_studio;
      }else{
        $annuncio->is_camera="0";
        $annuncio->numero_camere=$request->n_camere;
      }
      $annuncio->save();

      $id=DB::table('annuncio')->latest('created_at')->first();

      $val=$request->mainImg->store('/'.$id->id_annuncio,['disk'=>'my_files']);
      DB::table('annuncio')->where('id_annuncio',$id->id_annuncio)->update(['mainImg'=>$val]);
      if(isset($request->images)){
        foreach ($request->file('images') as $file){
          $image= new foto;
          $path= $file->store('immaginiAnnunci/'.$id->id_annuncio, ['disk'=>'my_files']);
          $image->url=$path;
          $image->id_annuncio=$id->id_annuncio;
          $image->save();
        }
      }
    }

    public function aggiungiAnnuncio(){
      return view('addAnnuncio');
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
