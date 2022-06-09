<!DOCTYPE html>
<html>

<head>
@include('includes/head')

</head>

<body class="sub_page">

  <div class="hero_area2">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
          @include('includes/navbar')
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- find section starts -->
  <section class="client_section layout_padding">
    <div class="container-fluid">
      <div class="heading_container psudo_white_primary mb_45">
        <h2>
          Richieste ricevute:
        </h2>
        @if(!empty($richieste))
            @foreach ($richieste as $richiesta)
              <div class="col-sm-62">
                <h4 class="faq-question">Id richiesta: {{ $richiesta->id_prenotazione }}</h4>
                @foreach($utenti as $utente)
                  @if($utente->id == $richiesta->id_locatario)
                  <p  class="faq-answer"> Nome: {{ $utente->nome }} <br>
                      Cognome: {{ $utente->cognome }} <br>
                      Data di nascita: {{ $utente->data_nascita }} <br>
                      Email: {{ $utente->email }} <br>
                      Numero: +{{ $utente->prefisso }} {{ $utente->numero }} <br>
                  </p>
                  @endif
                @endforeach
                <center>
                        <div class="quote_btn-container">
                            <form method="post" action="{{url('confermaprenotazione',['id_annuncio'=>$richiesta->id_annuncio] )}}">
                            {{method_field('PUT')}}
                            {{csrf_field()}}
                                
                                <div class="btn-box">
                                <button type="submit">
                                <span>
                                    Accetta richiesta
                                </span>
                                </button>
                                </div>    
                            
                            </form>
                            
                            
                            
                            &nbsp;
                            <a class="quote_btn" href="{{route('eliminaprenotazione',['id_prenotazione'=>$richiesta->id_prenotazione])}}" >Elimina richiesta</a>
                             &nbsp;
                            <a class="quote_btn" href="" >Contatta il locatario</a>

                        </div>
                    </center>
              </div>
            @endforeach
        @else
            <div class="col-sm-6 col-md-4">
              <div class='detail-box'>
                <h4>Nessuna richiesta ricevuta</h4>
              </div>
            </div>
          @endif
        </div>
      </div>
  </section>
  <!-- find section ends -->

  @include('contentSections.general.infoSection')



  <footer class="footer_section">
      @include('includes.footer')
  </footer>

  @include('includes/jsScript')

</body>
</html>
