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
                  <form method="POST" action="sendMessage" >
                    {{ csrf_field() }}
                   
                    
                    
                    
                    <div class="form-row"> <!-- Destinatario-->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                              <input type="text" name="destinatario" placeholder="Destinatario" class="form-control">
                        </div>
                      </div>
                        
                    <center> <!-- Messaggio -->
                      <div class="col-md-6sd px-0">
                        <div class="form-group ">
                            <label class="label">Descrizione</label>
                            <textarea name="messaggio" max="500" rows="50" cols="50" placeholder="Messaggio" class="form-control"></textarea>
                        </div>
                      </div>
                    </center>
                    
                     
                    <div class="btn-box">
                      <button type="submit">
                        <span>
                          INVIA MESSAGGIO
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
