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


                        <div class="content">
                            <div class="individual__section" >
                            <center>
                                <h3 class="h2 mr-auto">{{$username}} </h3> <br>

                                <div class="Rent_form find_form">

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
                            </div>

                            <div class="Rent_form find_form">


                  <form method="post" action="{{url('reply', [$username])}}">
                    {{method_field('PUT')}}
                    {{csrf_field()}}

                    <div class="form-row"> <!-- Messaggio -->
                      <div class="col-md-6 px-0">
                        <div class="form-group ">
                          <div class="input-group ">


                              <input type="text"  name="messaggio" placeholder="Invia un messaggio" class="form-control "   required value=""> </input>
                          </div>
                        </div>
                      </div>

                    </div>


                    <div class="btn-box">
                      <button type="submit">
                        <span>
                          INVIA
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
