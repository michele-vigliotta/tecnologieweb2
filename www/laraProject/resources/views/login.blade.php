<!DOCTYPE html>
<html>

<head>
    @include('includes.head')
</head>

<body class="sub_page">

  @if(isset(Auth::user()->nome))
    <script>window.location.href = "{{ route('homeutente') }}";</script>
  @endif

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
                  <form method="POST" action="user">
                    @csrf
                    <div class="form-row">
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <img src="{{ URL('images/icon/user.png') }}" alt="User Image" />
                              </div>
                            </div>
                            <input type="text" name="username" class="form-control" id="inputRentDestination" placeholder="Username"/>
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
                            <input type="password" name="password" class="form-control" id="inputRentPropery" placeholder="Password" />
                          </div>
                        </div>
                      </div>
                    </div>
                     <div class="btn-box">
                      <button type="submit">
                        <span>
                          LOG IN
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

  @include('includes.jsScript')


</body>
</html>
