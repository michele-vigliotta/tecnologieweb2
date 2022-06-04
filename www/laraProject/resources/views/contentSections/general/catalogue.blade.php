<!-- catalogue section -->
<section class="sale_section layout_padding">
  <div class="container-fluid">
    <div class="heading_container">
      <h1>
        Catalogo
      </h1>
      @if(isset(Auth::user()->nome))
        @if('locatario'==(Auth::user()->tipo))
          <div class="filter_section layout_padding">
            <div class="container">
              <div class="row">
                <div class="col-md-13">
                  <div class="form_tab_container">
                    <div class="tab-content text-center">
                      <div class="tab-pane active" id="rent">
                        <div class="Rent_form filter_form">
                          <form method="POST" action="filterCatalog">
                            @csrf
                            <div class="form-row">
                              <div class="col-md-6 px-0"><!-- Tipo di appartamento -->
                                      <div class="form-group">
                                        <div class="input-group">
                                          <select name="tipo" id="type" class="form-control">
                                            <option value="" selected></option>
                                            <option value="appartamento">Appartamento</option>
                                            <option value="camera_s">Camera singola</option>
                                            <option value="camera_m">Camera multipla</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                              <div class="col-md-6 px-0"><!-- Citta -->
                                      <div class="form-group ">
                                        <div class="input-group ">
                                          <input type="text" name="citta" class="form-control" placeholder="Città"/>
                                        </div>
                                      </div>
                                    </div>
                              <div class="col-md-6 px-0"><!-- Periodo locazione -->
                                      <div class="form-group">
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text">Da: </span>
                                          </div>
                                          <input type="date" name="inizio" class="form-control" max="9999-12-31"/>
                                          <div class="input-group-prepend">
                                            <span class="input-group-text">a: </span>
                                          </div>
                                          <input type="date" name="fine" class="form-control" max="9999-12-31"/>
                                        </div>
                                      </div>
                                    </div>
                              <div class="col-md-6 px-0"><!-- Cucina o locale ricreativo -->
                                      <div class="form-group ">
                                        <div class="form-control3">
                                          <input type="checkbox" name="cucina" class="checkbox-control" value="1"/> Cucina
                                          <input type="checkbox" name="locale_ricreativo" class="checkbox-control" value="1"/> Locale ricreativo
                                          <input type="checkbox" name="angolo_studio" class="checkbox-control" id="as" value="1" disabled/> Angolo Studio
                                        </div>
                                      </div>
                                    </div>
                              <div class="col-md-6 px-0"><!-- Dimensione -->
                                <div class="form-group ">
                                  <div class="input-group">
                                    <label class="l1">Dimensione</label>
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Min: </span>
                                    </div>
                                    <input type="number" name="dimensione_min" min="1" max="1000" class="form-control" min="1">
                                    <div class="input-group-append">
                                      <span class="input-group-text">m<sup>2</sup></span>
                                    </div>
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Max: </span>
                                    </div>
                                    <input type="number" name="dimensione_max" min="1" max="1000" class="form-control" min="1">
                                    <div class="input-group-append">
                                      <span class="input-group-text">m<sup>2</sup></span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6 px-0"><!-- Numero posti letto totali -->
                                <div class="form-group ">
                                  <div class="input-group">
                                    <label class="l1">Numero posti letto totali</label>
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Min: </span>
                                    </div>
                                    <input type="number" name="n_posti_letto_totali_min" min="1" max="1000" class="form-control" min="1">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Max: </span>
                                    </div>
                                    <input type="number" name="n_posti_letto_totali_max" min="1" max="1000" class="form-control" min="1">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6 px-0"><!-- Numero camere -->
                                <div class="form-group ">
                                  <div class="input-group">
                                    <label class="l1">Numero Camere</label>
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Min: </span>
                                    </div>
                                    <input type="number" name="n_camere_min" min="1" max="1000" class="form-control" min="1">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Max: </span>
                                    </div>
                                    <input type="number" name="n_camere_max" min="1" max="1000" class="form-control" min="1">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6 px-0"><!-- Numero posti camera -->
                                <div class="form-group ">
                                  <div class="input-group">
                                    <label class="l1">Numero posti letto nella camera</label>
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Min: </span>
                                    </div>
                                    <input type="number" name="n_posti_camera_min" min="1" max="1000" class="form-control" min="1">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Max: </span>
                                    </div>
                                    <input type="number" name="n_posti_camera_max" min="1" max="1000" class="form-control" min="1">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6 px-0"><!-- Servizi -->
                                <div class="form-group">
                                  <div class="input-group">
                                    <label class="l1">Servizi</label>
                                    <select name="servizi[]" id="select1" multiple>
                                      <option value="Internet">Internet</option>
                                      <option value="Linea_telefonica">Linea telefonica</option>
                                      <option value="Animali_domestici">Animali domestici</option>
                                      <option value="Televisione">Televisione</option>
                                      <option value="Aria_condizionata">Aria condizionata</option>
                                      <option value="Fumatori_ammessi">Fumatori ammessi</option>
                                      <option value="Ascensore">Ascensore</option>
                                      <option value="Lavatrice">Lavatrice</option>
                                      <option value="Asciugatrice">Asciugatrice</option>
                                      <option value="Accesso_disabili">Accesso disabili</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6 px-0"><!-- Range prezzo -->
                                <div class="form-group ">
                                  <div class="input-group ">
                                    <label class="l1">Prezzo</label>
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Min: </span>
                                    </div>
                                    <input type="number" name="prezzo_min" class="form-control"/>
                                    <div class="input-group-append">
                                      <span class="input-group-text">€</span>
                                    </div>
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Max: </span>
                                    </div>
                                    <input type="number" name="prezzo_max" class="form-control"/>
                                    <div class="input-group-append">
                                      <span class="input-group-text">€</span>
                                    </div>
                                  </div>
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
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @else
            <a href="{{ route('login') }}">Accedi come locatario per filtrare<a>
          @endif
      @else
        <a href="{{ route('login') }}">Accedi come locatario per filtrare<a>
      @endif
    </div>
    <div class="form-row">
            @if(!empty($annunci))
                @foreach ($annunci as $annuncio)
                  @if($annuncio->status!=0)
                    <div class="col-sm-6 col-md-4">
                        <div class="box">
                            <a href="{{ route('dettagli',['id'=>$annuncio->id_annuncio]) }}">
                                <div class="img-box">
                                    <img src="./immaginiAnnunci/{{ $annuncio->mainImg }}" height="300px" class="disp">
                                </div>
                            </a>
                            <div class="detail-box">
                                <a href="{{ route('dettagli',['id'=>$annuncio->id_annuncio]) }}">
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
                  @else
                    <div class="col-sm-6 col-md-4">
                      <div class="box">
                        <a href="{{ route('dettagli',['id'=>$annuncio->id_annuncio]) }}" class="disabled">
                          <div class="img-box">
                              <img src="./immaginiAnnunci/{{ $annuncio->mainImg }}" height="300px" class="no_disp">
                          </div>
                        </a>
                        <div class="detail-box">
                          <a href="{{ route('dettagli',['id'=>$annuncio->id_annuncio]) }}" class="disabled">
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
                  @endif
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
<!-- end catalogue section -->
