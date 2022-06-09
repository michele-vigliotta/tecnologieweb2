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
        "Internet" => $request->Internet,
        "Linea telefonica" => $request->Linea_telefonica,
        "Animali domestici" => $request->Animali_domestici,
        "Televisione" => $request->Televisione,
        "Aria condizionata" => $request->Aria_condizionata,
        "Fumatori ammessi" => $request->Fumatori_ammessi,
        "Ascensore" => $request->Ascensore,
        "Lavatrice" => $request->Lavatrice,
        "Asciugatrice" => $request->Asciugatrice,
        "Accesso disabili" => $request->Accesso_disabili,
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

      if(Storage::disk('public')->exists('service.json')){
        $annuncio->servizi_offerti=Storage::disk('public')->get('service.json');
        Storage::disk('public')->delete('service.json');
      }



      if($request->tipo=="camera"){
        $annuncio->is_camera="1";
        $annuncio->posti_camera=$request->n_posti_camera;
        if(!$request->filled('disponiblita_angolo_studio')){
          $annuncio->disponilita_angolo_studio='no';
        }else{
          $annuncio->disponilita_angolo_studio=$request->disponiblita_angolo_studio;
        }
      }else{
        $annuncio->is_camera="0";
        $annuncio->numero_camere=$request->n_camere;
        if($request->filled('cucina')){
          $annuncio->cucina=$request->cucina;
        }else{
          $annuncio->cucina="0";
        }
        if($request->filled('locale_ricreativo')){
          $annuncio->locale_ricreativo=$request->locale_ricreativo;
        }else{
          $annuncio->locale_ricreativo="0";
        }
      }
      $annuncio->save();

      $id=DB::table('annuncio')->latest('created_at')->first();

      if(isset($request->mainImg)){
        $val=$request->mainImg->store('/'.$id->id_annuncio,['disk'=>'my_files']);
        DB::table('annuncio')->where('id_annuncio',$id->id_annuncio)->update(['mainImg'=>$val]);
      }
      if(isset($request->images)){
        foreach ($request->file('images') as $file){
          $image= new foto;
          $path= $file->store('/'.$id->id_annuncio, ['disk'=>'my_files']);
          $image->url=$path;
          $image->id_annuncio=$id->id_annuncio;
          $image->save();
        }
      }

      return redirect()->route('dettagli',['id'=>$id->id_annuncio]);
    }

    public function aggiungiAnnuncio(){
      return view('addAnnuncio');
    }

    public function filterCatalog(Request $request){
      $check=false;

      $query="select * from annuncio ";

      if($request->filled('tipo')){ //Filtro tipo alloggio
        if($request->tipo=='appartameto'){
          $query.="where is_camera='0' ";
        }else{
          $query.="where is_camera='1' ";
        }
        $check=true;
      }

      if($request->filled('citta')){ //Filtro città
        if($check){
          $query.="where citta='".$request->citta."' ";
          $check=true;
        }else {
          $query.="and citta='".$request->citta."' ";
        }

      }

      if($request->filled('inizio')&&!$request->filled('fine')){ //FIltro periodo locazione inizio
        if($check){
          $query.="and inizio_locazione>='".$request->inizio."' ";
        }else{
          $query.="where inizio_locazione>='".$request->inizio."' ";
          $check=true;
        }
      }

      if($request->filled('fine')&&!$request->filled('inizio')){ //Filtro periodo locazione fine
        if($check){
          $query.="and fine_locazione<='".$request->fine."' ";
        }else{
          $query.="where fine_locazione<='".$request->fine."' ";
          $check=true;
        }
      }

      if($request->filled('inizio')&&$request->filled('fine')){ //Filtro periodo locazione inizio-fine
        if($check){
          $query.="and inizio_locazione>='".$request->inizio."' and fine_locazione<='".$request->fine."' ";
        }else{
          $query.="where inizio_locazione>='".$request->inizio."' and fine_locazione<='".$request->fine."' ";
          $check=true;
        }
      }

      if($request->filled('cucina')){ //Filtro cucina
        if($check){
          $query.="and cucina='1' ";
        }else{
          $query.="where cucina='1' ";
          $check=true;
        }
      }

      if($request->filled('locale_ricreativo')){ //Filtro locale ricreativo
        if($check){
          $query.="and locale_ricreativo='1' ";
        }else{
          $query.="where locale_ricreativo='1' ";
          $check=true;
        }
      }

      if($request->filled('angolo_studio')){ //Filtro angolo studio
        if($check){
          $query.="and angolo_studio='1' ";
        }else{
          $query.="where angolo_studio='1' ";
          $check=true;
        }
      }

      if($request->filled('dimensione_min') && !$request->filled('dimensione_max')){ //Filtro dimensione minima
        if($check){
          $query.="and dimensione>='".$request->dimensione_min."' ";
        }else{
          $query.="where dimensione>='".$request->dimensione_min."' ";
          $check=true;
        }
      }

      if($request->filled('dimensione_max') && !$request->filled('dimensione_min')){ //Filtro dimensione massima
        if($request->dimensione_max!=0){
          if($check){
            $query.="and dimensione<='".$request->dimensione_max."' ";
          }else{
            $query.="where dimensione<='".$request->dimensione_max."' ";
            $check=true;
          }
        }
      }

      if($request->filled('dimensione_max') && $request->filled('dimensione_min')){ //Filtro dimensione minima-massima
        if($request->dimensione_min!=0&&$request->dimensione_max!=0){
          if($check){
            $query.="and dimensione between '".$request->dimensione_min."' and '".$request->dimensione_max."' ";
          }else{
            $query.="where dimensione between '".$request->dimensione_min."' and '".$request->dimensione_max."' ";
            $check=true;
          }
        }
      }

      if($request->filled('n_posti_letto_totali_min') && !$request->filled('n_posti_letto_totali_max')){ // Filtro posti letto totali minimi
        if($check){
          $query.="and posti_letto_totali>='".$request->n_posti_letto_totali_min."' ";
        }else{
          $query.="where posti_letto_totali>='".$request->n_posti_letto_totali_min."' ";
          $check=true;
        }
      }

      if($request->filled('n_posti_letto_totali_max') && !$request->filled('n_posti_letto_totali_min')){ // Filtro posti letto totali minimi
        if($check){
          $query.="and posti_letto_totali<='".$request->n_posti_letto_totali_max."' ";
        }else{
          $query.="where posti_letto_totali<='".$request->n_posti_letto_totali_max."' ";
          $check=true;
        }
      }

      if($request->filled('n_posti_letto_totali_min')&&$request->filled('n_posti_letto_totali_max')){ // Filtro posti letto totali minimi-massimi
        if($check){
          $query.="and n_posti_letto_totali between '".$request->n_posti_letto_totali_min."' and '".$request->n_posti_letto_totali_max."' ";
        }else{
          $query.="where n_posti_letto_totali between '".$request->n_posti_letto_totali_min."' and '".$request->n_posti_letto_totali_max."' ";
          $check=true;
        }
      }

      if($request->filled('n_posti_camera_min') && !$request->filled('n_posti_camera_max')){ // Filtro posti camera minimi
        if($check){
          $query.="and posti_camera>='".$request->n_posti_camera_min."' ";
        }else{
          $query.="where posti_camera>='".$request->n_posti_camera_min."' ";
          $check=true;
        }
      }

      if($request->filled('n_posti_camera_max') && !$request->filled('n_posti_camera_min')){ // Filtro posti camera massimi
        if($check){
          $query.="and posti_camera<='".$request->n_posti_camera_max."' ";
        }else{
          $query.="where posti_camera<='".$request->n_posti_camera_max."' ";
          $check=true;
        }
      }

      if($request->filled('n_posti_camera_min')&&$request->filled('n_posti_camera_max')){ // Filtro posti camera minimi-massimi
        if($check){
          $query.="and n_posti_camera between '".$request->n_posti_camera_min."' and '".$request->n_posti_camera_max."' ";
        }else{
          $query.="where n_posti_camera between '".$request->n_posti_camera_min."' and '".$request->n_posti_camera_max."' ";
          $check=true;
        }
      }

      if($request->filled('n_camere_min') && !$request->filled('n_camere_max')){ // Filtro camere minimi
        if($check){
          $query.="and numero_camere>='".$request->n_camere_min."' ";
        }else{
          $query.="where numero_camere>='".$request->n_camere_min."' ";
          $check=true;
        }
      }

      if($request->filled('n_camere_max') && !$request->filled('n_camere_min')){ // Filtro camere massimi
        if($check){
          $query.="and numero_camere<='".$request->n_camere_max."' ";
        }else{
          $query.="where numero_camere<='".$request->n_camere_max."' ";
          $check=true;
        }
      }

      if($request->filled('n_camere_min')&&$request->filled('n_camere_max')){ // Filtro camere minimi-massimi
        if($check){
          $query.="and numero_camere between '".$request->n_camere_min."' and '".$request->n_camere_max."' ";
        }else{
          $query.="where numero_camere between '".$request->n_camere_min."' and '".$request->n_camere_max."' ";
          $check=true;
        }
      }

      if($request->filled('prezzo_min')&&$request->filled('prezzo_max')){ // Filtro prezzo minimo-massimo
        if($check){
          $query.="and canone_affitto between '".$request->prezzo_min."' ";
          $query.="and '".$request->prezzo_max."' ";
        }else{
          $query.="where canone_affitto between '".$request->prezzo_min."' ";
          $query.="and '".$request->prezzo_max."' ";
          $check=true;
        }
      }

      if($request->filled('prezzo_min')&&!$request->filled('prezzo_max')){ // Filtro prezzo minimo
        if($check){
          $query.="and canone_affitto>='".$request->prezzo_min."' ";
        }else {
          $query.="where canone_affitto>='".$request->prezzo_min."' ";
          $check=true;
        }
      }

      if($request->filled('prezzo_max')&&!$request->filled('prezzo_min')){ // Filtro prezzo massimo
        if($check){
          $query.="and canone_affitto<='".$request->prezzo_max."' ";
        }else {
          $query.="where canone_affitto<='".$request->prezzo_max."' ";
          $check=true;
        }
      }

      if($request->filled('servizi')){ // Filtro servizi

        foreach($request->servizi as $servizio){
          if($check){
            $query.="and servizi_offerti like '%\"".$servizio."\":\"si\"%' ";
          }else{
            $query.="where servizi_offerti like '%\"".$servizio."\":\"si\"%' " ;
            $check=true;
          }
        }

      }

      $annunci=DB::select($query);
      return view('catalogo', ['annunci'=>$annunci]);
    }

    public function catalogo(){
      $annunci=DB::select('select * from annuncio');
      return view('catalogo', ['annunci'=>$annunci]);
    }

    public function dettagli(Request $request){
      if(!isset(Auth::user()->username)){
        return redirect()->route('login');
      }
      $query="select * from annuncio where id_annuncio='".$request->id."'";
      $annuncio=DB::select($query);
      
      $query2="select * from foto where id_annuncio='".$request->id."'";
      $photo=DB::select($query2);
      
      $query3 = "select * from prenotazione where id_annuncio='".$request->id."' and id_locatario='".Auth::user()->id."'" ;
      $controllo= DB::select($query3);
      
      $query4 = "select username from utente where id='".$annuncio[0]->id_locatore."'";
      $username= DB::select($query4);

      return view('dettagli', ['annuncio'=>$annuncio, 'photo'=>$photo, 'controllo'=>$controllo, 'username_destinatario'=>$username[0]->username]);
    }

    public function annuncioedit(Request $request){
     $query="select * from annuncio where id_annuncio='".$request->id."'";
     $annuncio=DB::select($query);
     $lista_servizi=json_decode($annuncio[0]->servizi_offerti);
     //echo '<pre>'; print_r($lista_servizi->Televisione); echo '</pre>';
     return view('annuncioedit', ['annuncio'=>$annuncio, 'lista_servizi'=>$lista_servizi]);
    }

    public function annuncioupdate(Request $request){
        $service=[
                "Internet" => $request->nuovo_Internet,
                "Linea_telefonica" => $request->nuovo_Linea_telefonica,
                "Animali_domestici" => $request->nuovo_Animali_domestici,
                "Televisione" => $request->nuovo_Televisione,
                "Aria_condizionata" => $request->nuovo_Aria_condizionata,
                "Fumatori_ammessi" => $request->nuovo_Fumatori_ammessi,
                "Ascensore" => $request->nuovo_Ascensore,
                "Lavatrice" => $request->nuovo_Lavatrice,
                "Asciugatrice" => $request->nuovo_Asciugatrice,
                "Accesso_disabili" => $request->nuovo_Accesso_disabili,
          ];

        Storage::disk('public')->put('service.json', json_encode($service));

        DB::table('annuncio')->where('id_annuncio', $request->id)->update([
            'descrizione' => $request->input('nuova_descrizione'),
            'numero_camere' => $request->input('nuovo_n_camere'),
            'posti_camera' => $request->input('nuovo_n_posti_camera'),
            'posti_letto_totali' => $request->input('nuovo_n_posti_letto_totali'),
            'genere_locatario' => $request->input('nuovo_genere'),
            'dimensione' => $request->input('nuova_dimensione'),
            'inizio_locazione' => $request->input('nuovo_inizio_locazione'),
            'fine_locazione' => $request->input('nuovo_fine_locazione'),
            'canone_affitto' => $request->input('nuovo_canone'),
            'servizi_offerti' =>Storage::disk('public')->get('service.json'),
            
            ]);
        if($request->input('disponibilità')=='Disponibile'){
              DB::table('annuncio')->where('id_annuncio', $request->id)->update(['status'=> 1]);             
            }
        elseif($request->input('disponibilità')=='Non disponibile'){
              DB::table('annuncio')->where('id_annuncio', $request->id)->update(['status'=> 0]);   
            }
        return redirect()->route('annunci');
    }

    public function annunciodelete(Request $request) {
    DB::delete('delete from annuncio where id_annuncio = ?',[$request->id]);
    return redirect()->route('annunci');
    }


}

