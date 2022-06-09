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
                  <form method="post" action="{{url('annuncioupdate', [$annuncio[0]->id_annuncio])}}">
                    {{method_field('PUT')}}
                    {{csrf_field()}}
                    
                    <center> <!-- Descrizione -->
                      <div class="col-md-6sd px-0">
                        <div class="form-group ">
                            <label class="label">Descrizione</label>
                            <textarea name="nuova_descrizione" max="500" rows="50" cols="50"  class="form-control"> {{ $annuncio[0]->descrizione }} </textarea>
                        </div>
                      </div>
                    </center>
                    <div class="form-row">
                      @if ($annuncio[0]->is_camera == 0)
                          <div class="col-md-6 px-0">
                            <div class="form-group ">
                              <label>Numero Camere</label>
                              <input type="number" name="nuovo_n_camere" id="nc" class="form-control" value="{{ $annuncio[0]->numero_camere }}" min="1">
                            </div>
                          </div>
                       @else
                          <div class="col-md-6 px-0">
                            <div class="form-group ">
                              <label>Numero posti letto nella camera</label>
                              <input type="number" id="plc" name="nuovo_n_posti_camera" class="form-control" value="{{ $annuncio[0]->posti_camera }}" min="1">
                            </div>
                          </div>
                       @endif
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <label>Numero posti letto totali</label>
                          <input type="number" name="nuovo_n_posti_letto_totali" class="form-control" value="{{ $annuncio[0]->posti_letto_totali }}" min="1">
                        </div>
                      </div>
                    </div>
                    <div class="form-row"> <!-- Genere locatario, Dimensione-->
                      <div class="col-md-6 px-0">
                        <div class="form-group">
                            <label>Genere locatario: </label>
                            <select name="nuovo_genere" class="form-control" value="{{ $annuncio[0]->genere_locatario }}">
                                <option value="Non specificato">Non specificato</option>
                                <option value="Uomo">Uomo</option>
                                <option value="Donna">Donna</option>
                             </select>
                        </div>
                      </div>
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group">
                            <label>Dimensione</label>
                            <input type="number" name="nuova_dimensione" class="form-control" min="1" value="{{$annuncio[0]->dimensione}}">
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
                              @if($annuncio[0]->cucina == 1)
                                <input type="checkbox" name="nuovo_cucina" class="checkbox-control" checked value="1"/> Cucina
                              @else
                                <input type="checkbox" name="nuovo_cucina" class="checkbox-control" value="1"/> Cucina
                              @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                                @if($annuncio[0]->locale_ricreativo == 1)
                                  <input type="checkbox" name="nuovo_locale_ricreativo" class="checkbox-control" checked value="1"/> Locale Ricreativo
                                @else
                                  <input type="checkbox" name="nuovo_locale_ricreativo" class="checkbox-control" value="1"/> Locale Ricreativo
                                @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                              @if($lista_servizi->Internet == 'si')
                                <input type="checkbox" name="nuovo_Internet" class="checkbox-control" checked value="si"/> Internet
                              @else
                                <input type="checkbox" name="nuovo_Internet" class="checkbox-control" value="si"/> Internet
                              @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                                @if($lista_servizi->Linea_telefonica == 'si')
                                  <input type="checkbox" name="nuovo_Linea_telefonica" class="checkbox-control" checked value="si"/> Linea telefonica
                                @else
                                  <input type="checkbox" name="nuovo_Linea_telefonica" class="checkbox-control" value="si"/> Linea telefonica                              
                                @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                                @if($lista_servizi->Animali_domestici == 'si')
                                  <input type="checkbox" name="nuovo_Animali_domestici" class="checkbox-control" checked value="si"/> Animali domestici
                                @else
                                  <input type="checkbox" name="nuovo_Animali_domestici" class="checkbox-control" value="si"/> Animali domestici
                                @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                                @if($lista_servizi->Televisione == 'si')
                                  <input type="checkbox" name="nuovo_Televisione" class="checkbox-control" checked value="si"/> Televisione
                                @else
                                  <input type="checkbox" name="nuovo_Televisione" class="checkbox-control" value="si"/> Televisione
                                @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                                @if($lista_servizi->Aria_condizionata == 'si')
                                  <input type="checkbox" name="nuovo_Aria_condizionata" class="checkbox-control" checked value="si"/> Aria condizionata
                                @else
                                  <input type="checkbox" name="nuovo_Aria_condizionata" class="checkbox-control" value="si"/> Aria condizionata
                                @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                                @if($lista_servizi->Fumatori_ammessi == 'si')
                                  <input type="checkbox" name="nuovo_Fumatori_ammessi" class="checkbox-control" checked value="si"/> Fumatori ammessi
                                @else
                                  <input type="checkbox" name="nuovo_Fumatori_ammessi" class="checkbox-control" value="si"/> Fumatori ammessi
                                @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                                @if($lista_servizi->Ascensore == 'si')
                                  <input type="checkbox" name="nuovo_Ascensore" class="checkbox-control" checked value="si"/> Ascensore
                                @else
                                  <input type="checkbox" name="nuovo_Ascensore" class="checkbox-control" value="si"/> Ascensore
                                @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                                @if($lista_servizi->Lavatrice == 'si')
                                  <input type="checkbox" name="nuovo_Lavatrice" class="checkbox-control" checked value="si"/> Lavatrice
                                @else
                                  <input type="checkbox" name="nuovo_Lavatrice" class="checkbox-control" value="si"/> Lavatrice
                                @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                                @if($lista_servizi->Asciugatrice == 'si')
                                  <input type="checkbox" name="nuovo_Asciugatrice" class="checkbox-control" checked value="si"/> Asciugatrice
                                @else
                                  <input type="checkbox" name="nuovo_Asciugatrice" class="checkbox-control" value="si"/> Asciugatrice
                                @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 px-0">
                          <div class="form-group ">
                            <div class="form-control3">
                                @if($lista_servizi->Accesso_disabili == 'si')
                                  <input type="checkbox" name="nuovo_Accesso_disabili" class="checkbox-control" checked value="si"/> Accesso disabili
                                @else
                                  <input type="checkbox" name="nuovo_Accesso_disabili" class="checkbox-control" value="si"/> Accesso disabili
                                @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="form-control3">
                              @if($annuncio[0]->disponilita_angolo_studio != null)
                                <input type="checkbox" name="nuovo_angolo_studio" id="as" class="checkbox-control" checked value="si" disabled/> Angolo studio
                              @else
                                <input type="checkbox" name="nuovo_angolo_studio" id="as" class="checkbox-control" value="si" disabled/> Angolo studio
                              @endif
                          </div>
                        </div>
                      </div>
                    </center>
                    <div class="form-row"> <!-- Inizio e fine loczione-->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <label>Inizio locazione</label>
                          <input type="date" name="nuovo_inizio_locazione" value="{{ $annuncio[0]->inizio_locazione }}" class="form-control" />
                        </div>
                      </div>
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                            <label>Fine locazione</label>
                            <input type="date" name="nuovo_fine_locazione" value="{{ $annuncio[0]->fine_locazione }}"class="form-control" />
                        </div>
                      </div>
                    </div>
                    <div class="form-row"> <!-- Canone affitto e aggiungi immagini -->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group">
                            <label>Canone d'affitto: </label>
                            <input type="number" name="nuovo_canone" class="form-control" value="{{ $annuncio[0]->canone_affitto }}" min="0">
                            <div class="input-group-append">
                              <span class="input-group-text">€</span>
                            </div>
                          </div>
                        </div>
                      </div> <!-- Other Img -->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            <label>Aggiungi immagine</label>
                            <input type="file" name="images[]" class="form-control" id="inputRentDestination" multiple/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <center>
                      <div class="col-md-6 px-0">
                        <div class="form-group">
                            <label> Disponibilità locazione: </label>
                            <select name="disponibilità" class="form-control" value="Nessuna modifica">
                                <option value="Non specificato">Nessuna modifica</option>
                                <option value="Disponibile">Disponibile</option>
                                <option value="Non disponibile">Non disponibile</option>
                             </select>
                        </div>
                      </div>
                    </center>
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

  @include('contentSections.general.infoSection')



  <footer class="footer_section">
      @include('includes.footer')
  </footer>

  @include('includes/jsScript')

</body>
</html>
