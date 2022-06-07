<div class="filter_section">
  <div class="container">
    <div class="row">
      <div class="col-md-13">
        <div class="form_tab_container">
          <div class="tab-content text-center">
            <div class="tab-pane active" id="rent">
              <button type="button" class="filter">
                Filtro
              </button>
              <div class="filter-body">
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
                            <input id="d-min" onclick="valDMin()" onchange="valDMin()" type="number" step="10" name="dimensione_min" min="0" max="1000" class="form-control">
                            <div class="input-group-append">
                              <span class="input-group-text">m<sup>2</sup></span>
                            </div>
                            <div class="input-group-prepend">
                              <span class="input-group-text">Max: </span>
                            </div>
                            <input id="d-max" onclick="valMax()" onchange="valMax()" type="number" step="10" name="dimensione_max" min="0" max="1000" class="form-control">
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
                            <input id="pt-min" onclick="valPtMin()" onchange="valPtMin()" type="number" name="n_posti_letto_totali_min" min="1" max="1000" class="form-control" min="1">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Max: </span>
                            </div>
                            <input id="pt-max" onclick="valPtMax()" onchange="valPtMax()" type="number" name="n_posti_letto_totali_max" min="1" max="1000" class="form-control" min="1">
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
                            <input id="nc-min" onclick="valNcMin()" onchange="valNcMin()" type="number" name="n_camere_min" min="1" max="1000" class="form-control" min="1">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Max: </span>
                            </div>
                            <input id="nc-max" onclick="valNcMax()" onchange="valNcMax()" type="number" name="n_camere_max" min="1" max="1000" class="form-control" min="1">
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
                            <input id="pc-min" onclick="valPcMin()" onchange="valPcMin()" type="number" name="n_posti_camera_min" min="1" max="1000" class="form-control" min="1">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Max: </span>
                            </div>
                            <input id="pc-max" onclick="valPcMax()" onchange="valPcMax()" type="number" name="n_posti_camera_max" min="1" max="1000" class="form-control" min="1">
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
                      <div class="col-md-6 px-0"><!-- Prezzo -->
                        <div class="form-group ">
                          <div class="input-group ">
                            <label class="l1">Prezzo</label>
                            <div class="input-group-prepend">
                              <span class="input-group-text">Min: </span>
                            </div>
                            <input id="p-min" type="number" onclick="valPMin()" onchange="valPMin()" step="50" min="0" name="prezzo_min" class="form-control"/>
                            <div class="input-group-append">
                              <span class="input-group-text">€/M</span>
                            </div>
                            <div class="input-group-prepend">
                              <span class="input-group-text">Max: </span>
                            </div>
                            <input id="p-max" type="number" onclick="valPMax()" onchange="valPMax()" step="50" min="0" name="prezzo_max" class="form-control"/>
                            <div class="input-group-append">
                              <span class="input-group-text">€/M</span>
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
</div>
