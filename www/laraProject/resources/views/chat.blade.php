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

    
    
    
    
    
    
    
    
    

    <section class="client_section layout_padding">
        <div class="container-fluid">
            <div class="heading_container psudo_white_primary mb_45">
                <h2>My Inbox</h2>
                
                <div class="quote_btn-container">     
                    <a class="quote_btn" href="nuovomessaggio">Nuovo Messaggio</a>
                </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                @foreach ($messaggi as   $msg)
                
                    
                    
                
                    @foreach($utenti as $utente)
                        @if($msg->id_mittente==$utente->id)
                        <a href="{{route('messaggi',['id'=>$msg->id_mittente,'username'=>$utente->username])}}"><h3>{{$utente->username}}</h3>
                        @endif
                    @endforeach
                    
                       {{$msg->testo}}  
                </a>  
                @endforeach
                 
                
                
                 
            </div>
        </div>
    </section>