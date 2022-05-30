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
            <div class="tab-content text-center">
              <div class="tab-pane active" id="rent">
                <div class="Rent_form find_form">
                  @if(isset(Auth::user()->username))
                    <div>
                      <div class="content">
                          <div class="individual__section">
                              <div class="d-none d-md-block col-md-9">
   <div class="d-flex align-items-center justify-content-between">
      <h3 class="h2 mr-auto">{{Auth::user()->username}}

          <a href="" style="font-size:16px;">Modifica il profilo</a></h3>
   </div>
   <div class="account-info">
      <div class="row py-2">
         <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Nome</div>
         <div class="col-12 col-md-8 col-xl-9 dd"><span>{{Auth::user()->nome}}&nbsp;{{Auth::user()->cognome}}</span></div>
      </div>
       <hr>
       <div class="row py-2">
         <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Codice Fiscale</div>
         <div class="col-12 col-md-8 col-xl-9 dd">{{Auth::user()->c_fiscale}}</div>
      </div>
       <hr>
      <div class="row py-2">
         <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Tipo di account</div>
         <div class="col-12 col-md-8 col-xl-9 dd"><span style="display: inline-block; width: 16px; height: 16px; background-image: url('//static.cardmarket.com/img/f8d806e6267c7c859592cba11335f3d6/spriteSheets/ssMain2.png'); background-position: -448px -16px;" title="" data-toggle="tooltip" data-html="true" data-placement="bottom" onmouseover="showMsgBox(this,`Privato`)" onmouseout="hideMsgBox()" data-original-title="Privato" class="icon"></span><span class="ml-2">{{Auth::user()->tipo}}</span></div>
      </div>
       <hr>
      <div class="row py-2">
         <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Data di nascita</div>
         <div class="col-12 col-md-8 col-xl-9 dd">{{date('d-m-Y', strtotime(Auth::user()->data_nascita))}}</div>
      </div>
       <hr>
       <div class="row py-2">
         <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Email</div>
         <div class="col-12 col-md-8 col-xl-9 dd">{{Auth::user()->email}}</div>
      </div>
       <hr>
   <div class="row py-2">
         <div class="col-12 col-md-4 col-xl-3 mb-2 mb-md-0 dt">Numero</div>
         <div class="col-12 col-md-8 col-xl-9 dd">+{{Auth::user()->prefisso}}&nbsp;{{Auth::user()->numero}}</div>
      </div>
</div>


                    </div>
                  @else
                    <script>window.location = "/index";</script>
                  @endif
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
