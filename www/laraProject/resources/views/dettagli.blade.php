<!DOCTYPE html>
<html>

<head>
  @include('includes.head')
  @yield('optionalStyle')
</head>

<body class="sub_page">

  <div class="hero_area2">
      <header class="header_section">
          <div class="container-fluid">
              @include('includes.navbar')
          </div>

      </header>
  </div>

  <!-- find section starts -->

  <section class="find_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-10 mx-auto">
          <div class="form_tab_container">
            <div class="tab-content">
              <div class="tab-pane active" id="rent">
                <div class="Rent_form find_form">
                  <div class="dettagli">
                    <div class="carouselDettagli">
                      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <div class="container ">
                              <div class="col-md-10">
                              
                                @if($annuncio[0]->mainImg!=null)
                                  <img id="img" src="{{asset('/immaginiAnnunci/'.$annuncio[0]->mainImg) }}" height="300px" width="450px">
                                @else
                                  <img src="../images/no_img.jpg" height="300px" width="450px">
                                @endif
                              </div>
                            </div>
                          </div>
                          @foreach($photo as $ph)
                          <div class="carousel-item">
                            <div class="container ">
                              <div class="col-md-10">
                                <img src="{{asset('/immaginiAnnunci/'.$ph->url)}}" height="300px" width="450px">
                              </div>
                            </div>
                          </div>
                          @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                    </div>
                    <span class="span1"> <!-- Posizione alloggio -->
                      @if($annuncio[0]->tipo=='appartamento')
                        Appartamento
                      @else
                        Camera
                      @endif
                      in {{ $annuncio[0]->indirizzo}} <br> {{$annuncio[0]->CAP}} {{ $annuncio[0]->citta }}, {{$annuncio[0]->stato}}
                    </span>
                    <span class="span2">
                      {{ $annuncio[0]->descrizione}}
                    </span>
                      <div class="specifiche"><!-- Specifiche -->
                        <br><span class="span3">SPECIFICHE</span><br>
                        <span class="span4">&dash; Dimensione: {{$annuncio[0]->dimensione}}m<sup>2</sup></span><br>
                        <span class="span4">&dash; Genere locatario: {{$annuncio[0]->genere_locatario}}</span><br>
                        @if($annuncio[0]->is_camera==1)
                          <span class="span4">&dash; Posti letto nella camera: {{$annuncio[0]->posti_camera}}</span><br>
                          <span class="span4">&dash; disponiblita_angolo_studio: {{$annuncio[0]->disponilita_angolo_studio}}</span><br>
                        @else
                          <span class="span4">&dash; Numero di camere: {{$annuncio[0]->numero_camere}}</span><br>
                        @endif
                        <span class="span4">&dash; Posti letto totali: {{$annuncio[0]->posti_letto_totali}}</span><br>
                        <span class="span4">&dash; Possibilità di locazione da: {{date('d-m-Y', strtotime($annuncio[0]->inizio_locazione))}} a {{date('d-m-Y', strtotime($annuncio[0]->fine_locazione))}}</span><br><br>
                      </div>
                      <div class="prezzo">
                        <h4>Prezzo: <h2>{{$annuncio[0]->canone_affitto}}€</h2></h4><br>
                      </div>
                    <br>
                    <div class="servizi"> <!-- Servizi disponibli-->
                      <span class="span3">
                        SERVIZI DISPONIBILI
                      </span>
                      <div class="row">
                        &nbsp;&nbsp;<img class="service-img" src="{{asset('/images/icon/Service/Cucina.png')}}">
                        @if($annuncio[0]->cucina==1)
                          <span class="service">Cucina</span>
                        @else
                          <span class="service_no">Cucina</span>
                        @endif
                        &nbsp;&nbsp;<img class="service-img" src="{{asset('/images/icon/Service/Locale ricreativo.png')}}">
                        @if($annuncio[0]->locale_ricreativo==1)
                          <span class="service">Locale ricereativo</span>
                        @else
                          <span class="service_no">Locale ricereativo</span>
                        @endif
                        </div>
                        <div class="row">
                        @foreach(json_decode($annuncio[0]->servizi_offerti) as $service=>$value)
                          &nbsp;&nbsp;<img class="service-img" src="{{asset('/images/icon/Service/'.$service.'.png')}}">
                          @if($value!=null)
                            <span class="service">{{$service}}</span>
                          @else
                            <span class="service_no">{{$service}}</span>
                          @endif
                          @if($service=='Linea telefonica'||$service=='Televisione'||$service=='Fumatori ammessi'||$service=='Lavatrice')
                            </div>
                            <div class="row">
                          @endif
                        @endforeach
                      </div>
                    </div>
                    <br>
                    @if('locatario'==(Auth::user()->tipo))
                    <center>
                          <div class="quote_btn-container">
                            @if(empty($controllo))
                                  <a class="quote_btn" onclick="return confirm('Sicuro di voler prenotare questa locazione?')" href="{{ route('prenota',['id_locatore'=>$annuncio[0]->id_locatore, 'id_locatario'=>Auth::user()->id, 'id_annuncio'=>$annuncio[0]->id_annuncio]) }}">
                                    Prenota locazione
                                  </a>
                            &nbsp;
                            @else
                                  <a class="quote_btn" style="pointer-events: none; cursor: default;"> 
                                    Prenota locazione
                                  </a> 
                            
                            &nbsp;
                            @endif
                              <a class="quote_btn" href="{{ route('messaggi',['id'=>$annuncio[0]->id_locatore, 'username'=>$username_destinatario]) }}">
                                Contatta il locatore
                              </a>
                          </div>
                    @elseif('locatore'==(Auth::user()->tipo))
                         <a class="quote_btn" href="{{ route('richieste', ['id_annuncio'=>$annuncio[0]->id_annuncio]) }}">
                                Visualizza richieste ricevute
                              </a>
                    @endif
                   </center>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('contentSections/general/infoSection')


  @include('includes/footer')
  @include('includes.jsScript')


</body>
</html>
