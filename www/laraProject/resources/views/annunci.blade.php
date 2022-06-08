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
        @include('includes/navbar')
      </div>
    </header>
    <!-- end header section -->
  </div>
  <section class="sale_section layout_padding">
    <div class="container-fluid">
      <div class="heading_container">
        <h1>
          Annunci pubblicati:          
        </h1>
          <div class="quote_btn-container">
            <a class="quote_btn" href="{{route('aggAnnuncio')}}" >Pubblica nuovo annuncio</a>
          </div>
      </div>
         
        <div class="form-row">
          @if(!empty($annunci))
          @foreach ($annunci as $annuncio)
          @if($annuncio->status!=0)
          <div class="col-sm-6 col-md-4">
            <div class="box">
              <a href="{{ route('dettagli',['id'=>$annuncio->id_annuncio]) }}">
                <div class="img-box">
                  <img src="./immaginiAnnunci/{{ $annuncio->mainImg }}" height="300px" class="disp">
                </div>
              </a>
              <div class="detail-box">
                <a href="{{ route('dettagli',['id'=>$annuncio->id_annuncio]) }}">
                  <h4>{{ $annuncio->citta }}, {{$annuncio->stato}}</h4>
                </a>
                <h6>€{{ $annuncio->canone_affitto}}</h6>
                <label>Da {{date('d-m-Y', strtotime($annuncio->inizio_locazione))}} a {{date('d-m-Y', strtotime($annuncio->fine_locazione))}}</label>
                <p>
                  {{ $annuncio->descrizione }}
                </p>
              </div>
              <center>
                <div class="quote_btn-container">
                  <a class="quote_btn" href="{{route('annuncioedit',['id'=>$annuncio->id_annuncio])}}" >Modifica annuncio</a>
                             &nbsp;
                            <a class="quote_btn" href="{{route('annunciodelete',['id'=>$annuncio->id_annuncio])}}" >Elimina annuncio</a>
                </div>
              </center>
            </div>
          </div>
          @else
          <div class="col-sm-6 col-md-4">
            <div class="box">
              <a href="{{ route('dettagli',['id'=>$annuncio->id_annuncio]) }}" class="disabled">
                <div class="img-box">
                  <img src="./immaginiAnnunci/{{ $annuncio->mainImg }}" height="300px" class="no_disp">
                </div>
              </a>
              <div class="detail-box">
                <a href="{{ route('dettagli',['id'=>$annuncio->id_annuncio]) }}" class="disabled">
                  <h4>{{ $annuncio->citta }}, {{$annuncio->stato}}</h4>
                </a>
                <h6>€{{ $annuncio->canone_affitto}}</h6>
                <label>Da {{date('d-m-Y', strtotime($annuncio->inizio_locazione))}} a {{date('d-m-Y', strtotime($annuncio->fine_locazione))}}</label>
                <p>
                  {{ $annuncio->descrizione }}
                </p>
              </div>
              <center>
                <div class="quote_btn-container">
                  <a class="quote_btn" href="{{route('annuncioedit',['id'=>$annuncio->id_annuncio])}}" >Modifica annuncio</a>
                             &nbsp;
                            <a class="quote_btn" href="{{route('annunciodelete',['id'=>$annuncio->id_annuncio])}}" >Elimina annuncio</a>
                </div>
              </center>
            </div>
          </div>
          @endif
          @endforeach
          @else
          <div class="col-sm-6 col-md-4">
            <div class='detail-box'>
              <h4>Non hai ancora inserito annunci.</h4>
            </div>
          </div>
          @endif
        </div>
    </div>
  </section>
    
    @include('contentSections.general.infoSection')



  <footer class="footer_section">
      @include('includes.footer')
  </footer>

  @include('includes/jsScript')


</body>
</html>
