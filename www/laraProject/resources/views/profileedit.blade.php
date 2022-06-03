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

  <!-- phone prefix -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>

  <!-- font awesome style -->
  <link href="{{ URL('css/font-awesome.min.css')}}" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="{{ URL('css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ URL('css/responsive.css') }}" rel="stylesheet" />

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
                @if(isset(Auth::user()->nome))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('testimonial') }}">Chat</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('profile')}}">Profilo</a>
              </li>

                    @if('Locatore'==(Auth::user()->tipo))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('catalogo')}}">Annunci</a>
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

  <!-- edit section starts -->

  <section class="find_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-10 mx-auto">
          <div class="form_tab_container">
            <div class="tab-content text-center">
              <div class="tab-pane active" id="rent">
                <div class="Rent_form find_form">
                  @if ($message = Session::get('error'))
                   <div class="alert alert-danger alert-block">
                      <strong>{{ $message }}</strong>
                   </div>
                  @endif
                  @if (count($errors) > 0)
                    <div class="alert alert-danger">
                      @foreach($errors->all() as $error)
                        {{ $error }}<br>
                      @endforeach
                    </div>
                  @endif
                  <form method="POST" action="update">
                    @csrf
                    <div class="form-row"> <!-- Nome e Cognome -->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <img src="{{ URL('images/icon/nome.png') }}" alt="User Image" />
                              </div>
                            </div>
                            <input type="text" name="nuovo_nome" class="form-control" required value={{Auth::user()->nome}} />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <img src="{{ URL('images/icon/nome.png') }}" alt="User Image" />
                              </div>
                            </div>
                            <input type="text" name="nuovo_cognome" class="form-control" required value={{Auth::user()->cognome}} />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row"> <!-- Username e Password-->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <img src="{{ URL('images/icon/user.png') }}" alt="User Image" />
                              </div>
                            </div>
                            <input type="text" name="nuovo_username"class="form-control" required minlenght="4" value={{Auth::user()->username}} />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <img src="{{ URL('images/icon/email.png') }}" alt="Email image"/>
                              </div>
                            </div>
                            <input type="email" name="nuova_email" class="form-control" id="inputRentDestination" required value={{Auth::user()->email}} />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row"> <!-- Username e Password-->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <img src="{{ URL('images/icon/pass.png') }}" alt="Password Image" />
                              </div>
                            </div>
                            <input type="password" name="nuova_password" class="form-control" alphaNum minlenght="6" placeholder="Nuova password" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <img src="{{ URL('images/icon/pass.png') }}" alt="Password image"/>
                              </div>
                            </div>
                            <input type="password" name="conferma_password" class="form-control" placeholder="Conferma password" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row"> <!-- Data di nascità e Codice Fiscale-->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <img src="{{ URL('images/icon/calendario.png') }}" alt="Calendar Image" />
                              </div>
                            </div>
                            <input type="date" name="nuova_data_nascita" class="form-control" required value={{Auth::user()->data_nascita}} />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <img src="{{ URL('images/icon/codice.png') }}" alt="Code Image" />
                              </div>
                            </div>
                            <input type="text" name="nuovo_c_fiscale" class="form-control" required minlenght="16" maxlength="16" value={{Auth::user()->c_fiscale}} maxlength="16"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <center>
                      <div class="form-row"> <!-- Prefisso e Telefono-->
                        <div class="col-md-6_2 px-02">
                          <div class="form-group ">
                            <div class="input-group">
                              <input type="text" name="nuovo_prefisso" class="form-control" required minlenght="3" maxlength="3" value={{Auth::user()->prefisso}} size="3"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="input-group ">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <img src="{{ URL('images/icon/phone.png') }}" alt="Phone Image" />
                                </div>
                              </div>
                              <input type="text" name="nuovo_numero" class="form-control" required minlenght="10" maxlength="10" value={{Auth::user()->numero}} />
                            </div>
                          </div>
                        </div>
                      </div>
                    </center>
                        <hr>
                    <center> <!-- Email -->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <img src="{{ URL('images/icon/pass.png') }}" alt="Password Image" />
                              </div>
                            </div>
                            <input type="password" name="password_attuale" class="form-control" placeholder="Password attuale" />
                          </div>
                        </div>
                      </div>
                    <center>
                    <div class="btn-box">
                      <button type="submit">
                        <span>
                          SALVA
                        </span>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- find section ends -->

  <!-- info section -->
  <section class="info_section ">

    <div class="container">
      <div class="contact_nav">
        <a href="tel:+01 123455678990">
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
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <!-- nice select -->
  <script src="{{ URL('js/jquery.nice-select.min.js') }}"></script>
  <!-- bootstrap js -->
  <script src="{{ URL('js/bootstrap.js') }}"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- phone prefix -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  <!-- custom js -->
  <script src="{{ URL('js/custom.js') }}"></script>


</body>
</html>
