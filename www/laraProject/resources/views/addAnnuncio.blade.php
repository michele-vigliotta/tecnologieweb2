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
                  <form method="POST" action="addAnnuncio" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <center> <!-- Tipo annuncio -->
                      <div class="col-md-6 px-0">
                        <div class="form-group">
                          <div class="input-group ">
                            <label>Cosa vuoi affittare?</label>
                            <select name="tipo" id="type" class="form-control" required>
                              <option value="appartamento" selected>Appartamento</option>
                              <option valie="camera">Camera</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </center>
                    <center> <!-- Descrizione -->
                      <div class="col-md-6sd px-0">
                        <div class="form-group ">
                            <label class="label">Descrizione</label>
                            <textarea name="descrizione" max="500" rows="50" cols="50" placeholder="Descrizione dell'appartamento/camera" class="form-control"></textarea>
                        </div>
                      </div>
                    </center>
                    <div class="form-row"> <!-- Stato-Città-CAP-Indirizzo-->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                              <input type="text" name="stato" placeholder="Stato" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            <input type="text" name="citta" class="form-control" placeholder="Città" class="form-control"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            <input type="text" name="CAP" class="form-control" placeholder="CAP" class="form-control"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <input type="text" name="indirizzo" placeholder="Indirizzo" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="form-row"> <!-- N. Camere, N. Posti letto totali, N. Posti letto singola camera-->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <label>Numero Camere</label>
                          <input type="number" name="n_camere" id="nc" class="form-control" placeholder="1" min="1">
                        </div>
                      </div>
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <label>Numero posti letto nella camera</label>
                          <input type="number" id="plc" name="n_posti_camera" class="form-control" placeholder="1" min="1" disabled>
                        </div>
                      </div>
                    </div>
                    <center>
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <label>Numero posti letto totali</label>
                          <input type="number" name="n_posti_letto_totali" class="form-control" placeholder="1" min="1">
                        </div>
                      </div>
                    </center>
                    <div class="form-row"> <!-- Genere locatario, Dimensione-->
                      <div class="col-md-6 px-0">
                        <div class="form-group">
                            <label>Genere locatario: </label>
                            <select name="genere" class="form-control">
                                <option value="Non specificato">Non specificato</option>
                                <option value="appartamento">Uomo</option>
                                <option valie="camera">Donna</option>
                              </select>
                        </div>
                      </div>
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group">
                            <label>Dimensione</label>
                            <input type="number" name="dimensione" class="form-control" min="1">
                            <div class="input-group-append">
                              <span class="input-group-text">m<sup>2</sup></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br><br>
                    <center><!-- Servizi -->
                      <div class="col-md-6sd px-0">
                        <div class="form-group ">
                          <label> Servizi disponibli </label>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                              <input type="checkbox" name="servizio1" class="checkbox-control" value="Rete internet"/> Rete internet
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                              <input type="checkbox" name="servizio2" class="checkbox-control" value="Fermata mezzi nei pressi dell'abitazione"/> Fermata mezzi nei pressi dell'abitazione
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                              <input type="checkbox" name="servizio3" class="checkbox-control" value="Risacaldamento"/> Riscaldamento
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                              <input type="checkbox" name="servizio4" class="checkbox-control" value="Ascensore"/> Ascensore
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="form-control3">
                            <input type="checkbox" name="angolo_studio" id="as" class="checkbox-control" value="si" disabled/> Angolo studio
                          </div>
                        </div>
                      </div>
                    </center>
                    <div class="form-row"> <!-- Inizio e fine loczione-->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <label>Inizio locazione</label>
                          <input type="date" name="inizio_locazione" class="form-control" />
                        </div>
                      </div>
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                            <label>Fine locazione</label>
                            <input type="date" name="fine_locazione" class="form-control" />
                        </div>
                      </div>
                    </div>
                    <center> <!-- Canone affitto -->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group">
                            <label>Canone d'affitto: </label>
                            <input type="number" name="canone" class="form-control" min="0">
                            <div class="input-group-append">
                              <span class="input-group-text">€</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </center>
                    <center> <!-- Main Img -->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            <label>Immagine di presentazione</label>
                            <input type="file" name="mainImg" class="form-control" id="inputRentDestination"/>
                          </div>
                        </div>
                      </div>
                    </center>
                    <center> <!-- Other Img -->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            <label>Ulteriori immagini</label>
                            <input type="file" name="images[]" class="form-control" id="inputRentDestination"/>
                          </div>
                        </div>
                      </div>
                    </center>
                    <div class="btn-box">
                      <button type="submit">
                        <span>
                          AGGIUNGI ANNUNCIO
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
