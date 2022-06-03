<!-- catalogue section -->
<section class="sale_section layout_padding">
    <div class="container-fluid">
        <div class="heading_container">
            <h1>
                Catalogo
            </h1>

            @if(isset(Auth::user()->nome))
                @if('locatario'==(Auth::user()->tipo))
                    <h3>Filtri</h3>
                    <form method="POST" action="filterCatalog">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 px-0">
                                <div class="form-group ">
                                    <div class="input-group ">
                                        <input type="text" name="citta" class="form-control" placeholder="Città"/>
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            <div class="col-md-6 px-0">
                                <div class="form-group">
                                    <div class="input-group">
                                        <h6>Da</h6> <input type="date" name="inizio" class="form-control"/>
                                        <h6>a</h6> <input type="date" name="fine" class="form-control"/>
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
                        </div>
                    </form>
                @endif
            @else
                <a href="{{ route('signup') }}">Accedi come locatario per filtrare<a>
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
