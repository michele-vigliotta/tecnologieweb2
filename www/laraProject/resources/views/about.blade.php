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
  </div>

  @include('contentSections.general.about')
  </div>

  <div id="main">
  @include('contentSections/general/infoSection')


  @include('includes/footer')
  @include('includes.jsScript')

  </div>
</body>

</html>
