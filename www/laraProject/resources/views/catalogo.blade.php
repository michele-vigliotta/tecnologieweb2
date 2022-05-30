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
                    <a class="nav-link" href="{{ route('index') }}"> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('catalogo') }}"> Catalogo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}"> About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('why') }}"> Why Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
                </li>
            @if(isset(Auth::user()->nome))
              <li class="nav-item">
                <a class="nav-link" href="">Chat</a>
              </li>
              <li class="nav-item">
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
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>


  <!-- sale section -->
  <section class="sale_section layout_padding">
    <div class="container-fluid">
      <div class="heading_container">
        <h1>
          Catalogo
        </h1>

        @if(isset(Auth::user()->nome))
            @if('locatario'==(Auth::user()->tipo))
            <h3>Filtri</h3>
          <form method="POST" action="filterCatalog">
            @csrf
            <div class="form-row">
              <div class="col-md-6 px-0">
                <div class="form-group ">
                  <div class="input-group ">
                    <input type="text" name="citta" class="form-control" placeholder="Città"/>
                  </div>
                </div>
              </div>
              &nbsp;
              <div class="col-md-6 px-0">
                <div class="form-group">
                  <div class="input-group">
                    <h6>Da</h6> <input type="date" name="inizio" class="form-control"/>
                    <h6>a</h6> <input type="date" name="fine" class="form-control"/>
                  </div>
                </div>
              </div>
              <div class="btn-box">
                <button type="submit">
                  <span>
                    Cerca
                  </span>
                </button>
             </div>
          </div>
        </form>
            @endif
        @else
        <a href="{{ route('signup') }}">Accedi come locatario per filtrare<a>
        @endif
      </div>
      <div class="form-row">
        @if(!empty($annunci))
          @foreach ($annunci as $annuncio)
            <div class="col-sm-6 col-md-4">
              <div class="box">
                <a href="{{ route('dettagli') }}">
                  <div class="img-box">
                    <img src="./immaginiAnnunci/{{ $annuncio->mainImg }}" height="300px">
                  </div>
                </a>
                <div class="detail-box">
                  <a href="{{ route('dettagli') }}">
                    <h4>{{ $annuncio->citta }}, {{$annuncio->stato}}</h4>
                  </a>
                  <h6>€{{ $annuncio->canone_affitto}}</h6>
                  <label>Da {{date('d-m-Y', strtotime($annuncio->inizio_locazione))}} a {{date('d-m-Y', strtotime($annuncio->fine_locazione))}}</label>
                  <p>
                    {{ $annuncio->descrizione }}
                  </p>
                </div>
              </div>
            </div>
          @endforeach
        @else
          <div class="col-sm-6 col-md-4">
            <div class='detail-box'>
              <h4>Nessun annuncio disponibile, provare a modificare i filtri</h4>
            </div>
          </div>
        @endif
      </div>
    </div>
  </section>
  <!-- end sale section -->

  @include('contentSections/general/infoSection')


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- nice select -->
  <script src="js/jquery.nice-select.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script src="js/custom.js"></script>


</body>

</html>
