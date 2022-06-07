@extends('layouts.default')
@section('content')
    
    
    {{$username}}
    @foreach ($messaggimittente as $boh)
        {{$boh->testo}}
        {{$boh->timestamp}}
        <br>
    @endforeach
    
    
    
@stop

@section('carousel')

@stop
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     @include('contentSections/general/infoSection')


  @include('includes/footer')
  @include('includes.jsScript')


</body>
</html>