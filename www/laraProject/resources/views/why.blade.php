<!DOCTYPE html>
<html>

<head>
    @include('includes.head')
</head>

<body class="sub_page">

  <div class="hero_area">
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
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('index') }}"> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('catalogo') }}"> Catalogo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}"> About</a>
                </li>
                <li class="nav-item active">
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

    <section class="why_us_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Why Choose Us?
        </h2>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-6 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="images/w1.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Satisfied customers
              </h5>
              <p>
                Grazie a un'interfaccia immediata i nostri clienti sono in grado di pubblicare e cercare annunci in modo molto semplice.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="images/w2.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                24/7 Support
              </h5>
              <p>
                Il nostro team di supporto è attivo ogni ora ed è possibile contattarlo <a href="tel:+01 123455678990">telefonicamente</a>
                  o tramite <a href="mailto:demo@gmail.com">email</a>.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="images/w3.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Affordable price
              </h5>
              <p>
                Grazie al nostro sistema di ricerca i nostri clienti sono in grado di trovare le offerte più vantaggiose.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-box">
          @if(!isset(Auth::user()->nome))
        <a href="{{ route('signup') }}">
          Registrati ora
        </a>
          @endif
      </div>
    </div>
  </section>
  </div>

  <!-- why us section -->
  <br><!-- comment -->
  <br><!--  -->
  <br>
  <br>
  <br><!-- comment -->
  <br><!--  -->
  <br>
  <br>
  <br><!-- comment -->
  <br><!--  -->
  <br>
  <br>
  <br>
  <br>
  <br><!-- comment -->
  <br><!--  -->
  <br>
  <br>
  <br>
  <br>
  <br><!-- comment -->
  <br><!--  -->
  <br>
  <br>


  <!-- end why us section -->

@include('contentSections/general/infoSection')


  @include('includes/footer')
  @include('includes.jsScript')


</body>

</html>
