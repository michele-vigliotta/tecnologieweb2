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
  <div id="main">
    <!-- end why us section -->
      @include('contentSections/general/whyUs')

      @include('contentSections/general/infoSection')

      @include('includes/footer')
      @include('includes.jsScript')
  </div>
</body>

</html>
