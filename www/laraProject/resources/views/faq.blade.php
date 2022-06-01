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
        <h2>
          Frequently Asked Questions
        </h2>
          @if(!empty($FAQ))
            @foreach ($FAQ as $xfaq)
              <div class="col-sm-62">
                <h4 class="faq-question">{{ $xfaq->domanda }}</h4>
                <p  class="faq-answer">{{ $xfaq->risposta }}</p>
              </div>
            @endforeach
          @else
            <div class="col-sm-6 col-md-4">
              <div class='detail-box'>
                <h4>Nessuna faq disponibile</h4>
              </div>
            </div>
          @endif
      </div>
    </div>
  </section>


  @include('contentSections/general/infoSection')


  @include('includes/footer')
  @include('includes.jsScript')


</body>

</html>
