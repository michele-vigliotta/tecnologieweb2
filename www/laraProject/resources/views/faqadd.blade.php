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
                    <center><h2>Inserisci FAQ</h2></center>
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
                  
                  <form method="POST" action="faqsave">
                    @csrf
                    
                    <div class="form-row"> <!-- Domanda e Risposta -->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            
                              
                              <input type="text"  name="domanda" placeholder="domanda" class="form-control"   required > </input>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            
                              
                              <input type="text"  name="risposta" placeholder="risposta" class="form-control"   required > </input>
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
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>