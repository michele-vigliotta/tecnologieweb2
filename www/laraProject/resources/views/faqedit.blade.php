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
                    <center><h2>Modifica FAQ</h2></center>
                  
                  <form method="post" action="{{url('faqupdate', [$xfaq[0]->id_FAQ])}}">
                    {{method_field('PUT')}}
                    {{csrf_field()}}
                    
                    <div class="form-row"> <!-- Domanda e Risposta -->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            
                              
                              <input type="text"  name="nuova_domanda" placeholder="nuova domanda" class="form-control "   required value="{{ $xfaq[0]->domanda }}"> </input>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">
                            
                             <input type="text"  name="nuova_risposta" placeholder="nuova risposta" class="form-control "   required value="{{ $xfaq[0]->risposta }}"> </input>
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