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
    @foreach ($messaggi as $messaggio)
        @if($messaggio->id_mittente==Auth::user()->id)
            <p style="text-align: right;">
            {{$messaggio->testo}} <br>
            {{$messaggio->timestamp}} </p>
        @else
            <p style="text-align: left;">
            {{$messaggio->testo}} <br>
            {{$messaggio->timestamp}} </p>
        @endif
      @endforeach


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
