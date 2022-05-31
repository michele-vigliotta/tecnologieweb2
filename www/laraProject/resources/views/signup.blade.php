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

  <!-- find section starts -->

  <section class="find_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-10 mx-auto">
          <div class="form_tab_container">
            <div class="tab-content text-center">
              <div class="tab-pane active" id="rent">
                <div class="Rent_form find_form">
                  @if (count($errors) > 0)
                    <div class="alert alert-danger">
                      @foreach($errors->all() as $error)
                        {{ $error }}<br>
                      @endforeach
                    </div>
                  @endif
                  <form method="POST" action="register">
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
                            <input type="text" name="nome" class="form-control" placeholder="Nome"/>
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
                            <input type="text" name="cognome" class="form-control" placeholder="Cognome"/>
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
                            <input type="text" name="username"class="form-control" placeholder="Username"/>
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
                            <input type="password" name="password" class="form-control" placeholder="Password" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <center> <!-- Email -->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <img src="{{ URL('images/icon/email.png') }}" alt="Email Image" />
                              </div>
                            </div>
                            <input type="email" name="email" class="form-control" id="inputRentDestination" placeholder="E-mail"/>
                          </div>
                        </div>
                      </div>
                    </center>
                    <div class="form-row"> <!-- Data di nascità e Codice Fiscale-->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <img src="{{ URL('images/icon/calendario.png') }}" alt="Calendar Image" />
                              </div>
                            </div>
                            <input type="date" name="data_nascita" class="form-control" />
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
                            <input type="text" name="c_fiscale" class="form-control" placeholder="Codice Fiscale" maxlength="16"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <center>
                      <div class="form-row"> <!-- Prefisso e Telefono-->
                        <div class="col-md-6_2 px-02">
                          <div class="form-group ">
                            <div class="input-group">
                              <input type="text" name="prefisso" class="form-control" placeholder="Prefisso" size="3"/>
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
                              <input type="text" name="numero" class="form-control" placeholder="Telefono" maxlength="10"/>
                            </div>
                          </div>
                        </div>
                      </div>
                    </center>
                    <center>
                      <div class="col-md-6 px-0">
                        <div class="form-group">
                          <div class="input-group ">
                              <legend style="font-size:16px">Sei un?</legend>
                            <select name="tipo" class="form-control" required>
                              <option value="" disabled selected>Che tipo di utente sei?</option>
                              <option value="locatario">Locatario</option>
                              <option valie="locatore"> Locatore </option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </center>
                    <div class="btn-box">
                      <button type="submit">
                        <span>
                          REGISTRATI
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

  @include('contentSections/general/infoSection')


  @include('includes/footer')
  @include('includes.jsScript')


</body>
</html>
