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
                  @if(isset(Auth::user()->username))
                    <div>
                      <div class="content">
                          <div class="individual__section" >
                            <center>
                              <div class="d-none d-md-block col-md-9">




















    <h3 class="h2 mr-auto">{{$username}} </h3>
    <br>
    @if(count($messaggimittente)>count($messaggidestinatario))
      @for($i=0; $i<count($messaggimittente); $i++)
          <p style="text-align: left;">
          {{$messaggimittente[$i]->testo}} <br>
          {{$messaggimittente[$i]->timestamp}} </p>


          @if(array_key_exists($i,$messaggidestinatario))
            <p style="text-align: right;">
              {{$messaggidestinatario[$i]->testo}} <br>
              {{$messaggidestinatario[$i]->timestamp}} </p>
          @endif
      @endfor
    @else
      @for($i=0; $i<count($messaggidestinatario); $i++)
        @if(array_key_exists($i,$messaggimittente))
          <p style="text-align: left;">
          {{$messaggimittente[$i]->testo}} <br>
          {{$messaggimittente[$i]->timestamp}} </p>
        @endif
            <p style="text-align: right;">
              {{$messaggidestinatario[$i]->testo}} <br>
              {{$messaggidestinatario[$i]->timestamp}} </p>
      @endfor
    @endif


     </div>
                  </center>
                  @else
                    <script>window.location = "/index";</script>
                  @endif
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
