<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Affitta casa</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ URL('css/bootstrap.css') }}" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- nice selecy -->
  <link rel="stylesheet" href="{{ URL('css/nice-select.min.css') }}">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="{{ URL('css/font-awesome.min.css')}}" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="{{ URL('css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ URL('css/responsive.css') }}" rel="stylesheet" />

</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
        <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
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
              <li class="nav-item active">
                <a class="nav-link" href="{{ route('index') }}"> Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
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
              
             

            </ul>
            @if(isset(Auth::user()->nome))
              <div class="quote_btn-container">
                <a href="{{ route('profile') }}" class="quote_btn">
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



    <!-- slider section -->
    <section class="slider_section layout_padding">
      <div class="slider_bg_box">
        <img src="{{ URL('images/slider-bg.jpg') }}" alt="">
      </div>
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-10 mx-auto">
                  <div class="detail-box">
                    @if(!isset(Auth::user()->nome))
                    <h1>
                      Esplora <br>
                      Catalogo
                    </h1>
                    <div class="col-md-8 px-0">
                      <p>
                        Esplora le migliori offerte. 
                      </p>
                    </div>
                    <div class="btn-box">
                      <a href="{{ route('catalogo') }}" class="btn1">
                        Esplora
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-10 mx-auto">
                  <div class="detail-box">
                    <h1>
                      Possiedi un <br>
                      locale?
                    </h1>
                    <div class="col-md-8 px-0">
                        
                      <p>
                        Registrati e pubblica il tuo primo annuncio.
                      </p>
                    </div>
                    <div class="btn-box">
                      <a href="{{ route('signup') }}" class="btn1">
                        Registrati
                      </a>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-10 mx-auto">
                  <div class="detail-box">
                    <h1>
                      Cerchi <br>
                      una camera?
                    </h1>
                    <div class="col-md-8 px-0">
                      <p>
                        Registrati e prenota subito.
                      </p>
                    </div>
                    <div class="btn-box">
                      <a href="{{ route('signup') }}" class="btn1">
                        Registrati
                      </a>
                    </div>
                      @elseif('locatario'==(Auth::user()->tipo))
                       <h1>
                      Esplora <br>
                      Catalogo
                    </h1>
                    <div class="col-md-8 px-0">
                      <p>
                        Esplora le migliori offerte. 
                      </p>
                    </div>
                    <div class="btn-box">
                      <a href="{{ route('catalogo') }}" class="btn1">
                        Esplora
                      </a>
                    </div>
                      @else
                      <h1>
                      Possiedi un <br>
                      locale?
                    </h1>
                    <div class="col-md-8 px-0">
                        
                      <p>
                        Inizia pubblicando un annuncio.
                      </p>
                    </div>
                    <div class="btn-box">
                      <a href="{{ route('signup') }}" class="btn1">
                        Pubblica annuncio
                      </a>
                      @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
            
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel1" data-slide-to="1"></li>
          <li data-target="#customCarousel1" data-slide-to="2"></li>
        </ol>
      </div>

    </section>
    <!-- end slider section -->
  </div>

<div class="main">
  <!-- about section -->
  <section class="about_section layout_padding3">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Us
              </h2>
            </div>
            <p>
              Siamo una società che nasce con l'intento con l'intento di facilitare gli studenti nella ricerca di un alloggio,
              offrendo uno scambio di informazioni con il locatore nel modo più facile e chiaro possibile.
            </p>
            <a href="./about.html">
              Leggi più
            </a>
          </div>
        </div>
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="{{ URL('images/about-img.jpg')}}" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end about section -->

  <!-- sale section -->
  <section class="sale_section layout_padding2">
    <div class="container-fluid">
      <div class="heading_container">
        <h2>
          Tipi di camere
        </h2>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-4">
          <div class="box">
            <div class="img-box">
              <img src="{{ URL('images/monolocale.jpg') }}" alt="Monolocale image">
            </div>
            <div class="detail-box">
              <h6>
                Monolocale
              </h6>
              <p>
                Appartamento con una sola stanza che funge da camera, cucina, soggiorno, sala studio e una stanza per il bagno.
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="box">
            <div class="img-box">
              <img src="{{ URL('images/bilocale.jpg') }}" alt="Bilocale image">
            </div>
            <div class="detail-box">
              <h6>
                Bilocale
              </h6>
              <p>
                Appartamento con due stanze suddivise in modo tale da avere camera, cucina, soggiorno, sala studio e una stanza per il bagno.
              </p>
            </div>
          </div>
          <div class="btn-box">
            <a href="">
              Mostra più
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="box">
            <div class="img-box">
              <img src="{{ URL('images/trilocale.jpg') }}" alt="Trilocale image">
            </div>
            <div class="detail-box">
              <h6>
                Trilocale
              </h6>
              <p>
                Appartamento con tre stanze suddivise in modo tale da avere almeno una camera, cucina, soggiorno, sala studio e una stanza per il bagno.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end sale section -->

  <!-- why us section -->
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
              <img src="{{ URL('images/w1.png') }}" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Satisfied customers
              </h5>
              <p>
                Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC,
                making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in
                Virginia.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="{{ URL('images/w2.png') }}" alt="">
            </div>
            <div class="detail-box">
              <h5>
                24/7 Support
              </h5>
              <p>
                Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC,
                making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in
                Virginia.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="{{ URL('images/w3.png') }}" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Affordable price
              </h5>
              <p>
                Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC,
                making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in
                Virginia.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="">
          Read More
        </a>
      </div>
    </div>
  </section>
  <!-- end why us section -->

  <!-- client section -->
  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center psudo_white_primary mb_45">
        <h2>
          
        </h2>
      </div>
      <div class="carousel-wrap ">
        <div class="owl-carousel client_owl-carousel">
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="{{ URL('images/client1.jpg') }}" alt="" class="box-img">
              </div>
              <div class="detail-box">
                <div class="client_id">
                  <div class="client_info">
                    <h6>
                      LusDen
                    </h6>
                    <p>
                      magna aliqua. Ut
                    </p>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="{{ URL('images/client2.jpg') }}" alt="" class="box-img">
              </div>
              <div class="detail-box">
                <div class="client_id">
                  <div class="client_info">
                    <h6>
                      Zen Court
                    </h6>
                    <p>
                      magna aliqua. Ut
                    </p>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="{{ URL('images/client1.jpg') }}" alt="" class="box-img">
              </div>
              <div class="detail-box">
                <div class="client_id">
                  <div class="client_info">
                    <h6>
                      LusDen
                    </h6>
                    <p>
                      magna aliqua. Ut
                    </p>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="{{ URL('images/client2.jpg') }}" alt="" class="box-img">
              </div>
              <div class="detail-box">
                <div class="client_id">
                  <div class="client_info">
                    <h6>
                      Zen Court
                    </h6>
                    <p>
                      magna aliqua. Ut
                    </p>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end client section -->

  <!-- info section -->
  <section class="info_section ">

    <div class="container">
      <div class="contact_nav">
        <a href="">
          <i class="fa fa-phone" aria-hidden="true"></i>
          <span>
            Call : +01 123455678990
          </span>
        </a>
        <a href="mailto:demo@gmail.com">
          <i class="fa fa-envelope" aria-hidden="true"></i>
          <span>
            Email : demo@gmail.com
          </span>
        </a>
        <a href="">
          <i class="fa fa-map-marker" aria-hidden="true"></i>
          <span>
            Location
          </span>
        </a>
      </div>

      <div class="info_top ">
        <div class="row info_main_row">
          <div class=" col-md-4 col-lg-4 ">
            <div class="info_about">
              <h4>
                About Us
              </h4>
              <p>
                Siamo una società che nasce con l'intento con l'intento di facilitare gli studenti nella ricerca di un alloggio,
                facilitando lo scambio di informazioni con il locatore nel modo più facile e chiaro possibile.
              </p>
            </div>
          </div>
          <div class=" col-md-4 col-lg-3 mx-auto">
            <div class="info_links">
              <h4>
                QUICK LINKS
              </h4>
              <div class="info_links_menu">
                <a href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
                <a href="{{ route('about') }}"> About</a>
                <a href="{{ route('why') }}">Why Us</a>
                <a href="{{ route('faq') }}">FAQ</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info_form">
              <h4>
                SIGN UP TO OUR NEWSLETTER
              </h4>
              <form action="">
                <input type="text" placeholder="Enter Your Email" />
                <button type="submit">
                  Subscribe
                </button>
              </form>
              <div class="social_box">
                <a href="">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end info_section -->


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        Gruppo 19 - Marco Pasquale Martino, Filippo Montagnoli,
        Michele Vigliotta, Diego Vaccarini
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="{{ URL('js/jquery-3.4.1.min.js') }}"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- nice select -->
  <script src="{{ URL('js/jquery.nice-select.min.js') }}"></script>
  <!-- bootstrap js -->
  <script src="{{ URL('js/bootstrap.js') }}"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script src="{{ URL('js/custom.js') }}"></script>
</div>

</body>
</html>
