<!DOCTYPE html>
<html>

<head>
    @include('includes.head')
</head>

<body class="sub_page">

  <div class="hero_area2">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ route('index') }}">
            <span>
              Affitta casa
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('catalogo') }}">Catalogo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}"> About</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('why') }}">Why Us</a>
              </li>

              @if(isset(Auth::user()->nome))
              <li class="nav-item">
                <a class="nav-link" href="">Chat</a>
              </li>
              <li class="nav-item active">
                  <a class="nav-link" href="{{ route('profile')}}">Profilo</a>
              </li>

                    @if('Locatore'==(Auth::user()->tipo))
              <li class="nav-item">
                  <a class="nav-link" href="">Annunci</a>
              </li>
                    @endif
                @endif
            </ul>

            @if(isset(Auth::user()->nome))
              <div class="quote_btn-container">
                <a href="{{ route('homeutente') }}" class="quote_btn">
                  {{ Auth::user()->nome }}
                </a>
              </div>
              &nbsp
              <div class="quote_btn-container">
                <a href="{{ route('logout') }}" class="quote_btn">
                  LOGOUT
                </a>
              </div>
            @else
              <div class="quote_btn-container">
                <a href="{{ route('login') }}" class="quote_btn">
                  LOG IN
                </a>
              </div>
              &nbsp;
              <div class="quote_btn-container">
                <a href="{{ route('signup') }}" class="quote_btn">
                  SIGN UP
                </a>
              </div>
            @endif

        </nav>
      </div>
    </header>
    <!-- end header section -->
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
                      <div class="carousel slide">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <div class="container ">
                              <div class="col-md-10">
                                @if($annuncio[0]->mainImg!=null)
                                  <img src="../immaginiAnnunci/{{ $annuncio[0]->mainImg }}" height="300px">
                                @else
                                  <img src="../images/no_img.jpg" height="300px">
                                @endif
                              </div>
                            </div>
                          </div>
                          @foreach($photo as $ph)
                          <div class="carousel-item">
                            <div class="container ">
                              <div class="row">
                                <div class="col-md-10 mx-auto">
                                  <img src="../{{$ph->url}}" height="300px">
                                </div>
                              </div>
                            </div>
                          </div>
                          @endforeach
                        </div>
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
                        <span class="span4">&dash; Possibilità di locazione da: {{date('d-m-Y', strtotime($annuncio[0]->inizio_locazione))}} a {{date('d-m-Y', strtotime($annuncio[0]->fine_locazione))}}</span><br>
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
                        @foreach(json_decode($annuncio[0]->servizi_offerti) as $service=>$value)
                          <img class="service-img" src="../images/icon/service/{{$service}}_si.png">
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
                    <div class="contatta">
                      <div class="detail-box">
                        <div class="btn-box">
                          <a href="{{ route('chat',['id_locatore'=>$annuncio[0]->id_locatore, 'id_locatario'=>Auth::user()->id]) }}">
                            <h4>Contatta il locatore</h4>
                          </a>
                        </div>
                      </div>
                    </div>
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
