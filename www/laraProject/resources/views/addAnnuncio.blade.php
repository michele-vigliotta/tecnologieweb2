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
                            <label>Cosa vuoi mettere in affitto?</label>
                            <select name="tipo" id="type" class="form-control" required>
                              <option value="appartamento" selected>Appartamento</option>
                              <option value="camera">Camera</option>
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
                                <option value="Uomo">Uomo</option>
                                <option valie="Donna">Donna</option>
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
                              <input type="checkbox" name="cucina" class="checkbox-control" value="1"/> Cucina
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                              <input type="checkbox" name="locale_ricreativo" class="checkbox-control" value="1"/> Locale Ricreativo
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                              <input type="checkbox" name="Internet" class="checkbox-control" value="si"/> Internet
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                              <input type="checkbox" name="Linea_telefonica" class="checkbox-control" value="si"/> Linea telefonica
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                              <input type="checkbox" name="Animali_domestici" class="checkbox-control" value="si"/> Animali domestici
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                              <input type="checkbox" name="Televisione" class="checkbox-control" value="si"/> Televisione
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                              <input type="checkbox" name="Aria_condizionata" class="checkbox-control" value="si"/> Aria condizionata
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                              <input type="checkbox" name="Fumatori_ammessi" class="checkbox-control" value="si"/> Fumatori ammessi
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                              <input type="checkbox" name="Ascensore" class="checkbox-control" value="si"/> Ascensore
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                              <input type="checkbox" name="Lavatrice" class="checkbox-control" value="si"/> Lavatrice
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                              <input type="checkbox" name="Asciugatrice" class="checkbox-control" value="si"/> Asciugatrice
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                              <input type="checkbox" name="Accesso_disabili" class="checkbox-control" value="si"/> Accesso disabili
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
                            <input type="file" name="images[]" class="form-control" id="inputRentDestination" multiple/>
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

  @include('contentSections.general.infoSection')



  <footer class="footer_section">
      @include('includes.footer')
  </footer>

  @include('includes/jsScript')


</body>
</html>
