<!DOCTYPE html>
<html>

<head>
    @include('includes.head')

<link rel="stylesheet" type="text/css" href="{{ URL('css/chatstyle.css') }}"">

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
                
                    
                    
                    
                  
                    <div class="containerchat">
                        <div class="headerchat">
                            <h1>{{$username}} </h1>
                        </div>
                        <div class="bodychat">

                                @foreach ($messaggi as $messaggio)
                                            @if($messaggio->id_mittente==Auth::user()->id)
                                                <p class="message user_message">
                                                {{$messaggio->testo}} <br>
                                                {{$messaggio->timestamp}} </p>
                                            @else
                                                <p class="message">
                                                {{$messaggio->testo}} <br>
                                                {{$messaggio->timestamp}} </p>
                                            @endif
                                        @endforeach
                        </div>
                        
                        <div class="footerchat">
                            <form method="post" action="{{url('reply', [$username])}}">
                            {{method_field('PUT')}}
                            {{csrf_field()}}
                            <input type="text" name="messaggio" required> </input>
			<button>INVIA</button>
                            </form>	
                        </div>    
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
