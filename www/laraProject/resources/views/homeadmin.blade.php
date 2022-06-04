<!DOCTYPE html>
<html>

<head>
  @include('includes/head')
</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
          @include('includes/navbar')
      </div>
    </header>
    <!-- end header section -->

<div class="main">
  <!-- welcome section -->
  <section class="about_section layout_padding3">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Bentornato Admin!
              </h2>
            </div>

            <p>
              Questa è la home admin
            </p>




          </div>
        </div>
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="{{ URL('images/about-img.jpg')}}" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end about section -->



  <!-- why us section -->
  <section class="why_us_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Why Choose Us?
        </h2>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-6 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="{{ URL('images/w1.png') }}" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Satisfied customers
              </h5>
              <p>
                Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC,
                making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in
                Virginia.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="{{ URL('images/w2.png') }}" alt="">
            </div>
            <div class="detail-box">
              <h5>
                24/7 Support
              </h5>
              <p>
                Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC,
                making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in
                Virginia.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="{{ URL('images/w3.png') }}" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Affordable price
              </h5>
              <p>
                Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC,
                making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in
                Virginia.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="">
          Read More
        </a>
      </div>
    </div>
  </section>
  <!-- end why us section -->

  @include('contentSections/general/clientSection')

    @include('contentSections/general/infoSection')


    @include('includes/footer')
    @include('includes.jsScript')
</div>

</body>
</html>
