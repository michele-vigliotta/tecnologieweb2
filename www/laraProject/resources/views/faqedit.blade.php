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
          @include('includes/navbar')
      </div>
    </header>
    <!-- end header section -->
  </div>

    
    
    
    
    
    
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
                    <div class="form-row"> <!-- Domanda e Risposta -->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <img src="" alt="Domanda" />
                              </div>
                            </div>
                              <label for="ndomanda"> Domanda: </label><br>
                              <input type="text" id="ndomanda" name="nuova_domanda" class="form-control"   required value="{{ $xfaq[0]->domanda }}"  /> 
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <img src="" alt="Risposta" />
                              </div>
                            </div>
                              <label for="nrisposta">Risposta:</label><br>
                              <textarea id="nrisposta" name="nuova_risposta" rows="4" cols="50" required value="{{ $xfaq[0]->risposta }}"> </textarea>
                            </div>
                        </div>
                      </div>
                    </div>
                    
                    
                    <div class="btn-box">
                      <button type="submit">
                        <span>
                          SALVA
                        </span>
                      </button>
                    <div class="btn-box">
                      <button type="submit">
                        <span>
                          ELIMINA
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
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     @include('contentSections/general/infoSection')


  @include('includes/footer')
  @include('includes.jsScript')


</body>
</html>