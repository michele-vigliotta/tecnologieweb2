<!DOCTYPE html>
<html>

<head>
    @include('includes.head')
</head>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
          @include('includes/navbar')
      </div>
    </header>
    <!-- end header section -->
  </div>


  <!-- sale section -->

  <section class="sale_section layout_padding">
    <div class="container-fluid">
      <div class="heading_container">
        <h2>
          House For Sale
        </h2>
        <p>
          There are many variations of passages of Lorem Ipsum available, but the
        </p>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-4">
          <div class="box">
            <div class="img-box">
              <img src="images/s1.jpg" alt="">
            </div>
            <div class="detail-box">
              <h6>
                Apartments house
              </h6>
              <p>
                There are many variations of passages of Lorem Ipsum available, but
              </p>
              <a href="">
                View Detail
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="box">
            <div class="img-box">
              <img src="images/s2.jpg" alt="">
            </div>
            <div class="detail-box">
              <h6>
                Apartments house
              </h6>
              <p>
                There are many variations of passages of Lorem Ipsum available, but
              </p>
              <a href="">
                View Detail
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="box">
            <div class="img-box">
              <img src="images/s3.jpg" alt="">
            </div>
            <div class="detail-box">
              <h6>
                Apartments house
              </h6>
              <p>
                There are many variations of passages of Lorem Ipsum available, but
              </p>
              <a href="">
                View Detail
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="box">
            <div class="img-box">
              <img src="images/s4.jpg" alt="">
            </div>
            <div class="detail-box">
              <h6>
                Apartments house
              </h6>
              <p>
                There are many variations of passages of Lorem Ipsum available, but
              </p>
              <a href="">
                View Detail
              </a>
            </div>
          </div>

        </div>
        <div class="col-sm-6 col-md-4">
          <div class="box">
            <div class="img-box">
              <img src="images/s5.jpg" alt="">
            </div>
            <div class="detail-box">
              <h6>
                Apartments house
              </h6>
              <p>
                There are many variations of passages of Lorem Ipsum available, but
              </p>
              <a href="">
                View Detail
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="box">
            <div class="img-box">
              <img src="images/s6.jpg" alt="">
            </div>
            <div class="detail-box">
              <h6>
                Apartments house
              </h6>
              <p>
                There are many variations of passages of Lorem Ipsum available, but
              </p>
              <a href="">
                View Detail
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="">
          Find More
        </a>
      </div>
    </div>
  </section>

  <!-- end sale section -->

  <!-- info section -->
  <section class="info_section ">

    <div class="container">
      <div class="contact_nav">
        <a href="">
          <i class="fa fa-phone" aria-hidden="true"></i>
          <span>
            Call : +01 123455678990
          </span>
        </a>
        <a href="">
          <i class="fa fa-envelope" aria-hidden="true"></i>
          <span>
            Email : demo@gmail.com
          </span>
        </a>
        <a href="">
          <i class="fa fa-map-marker" aria-hidden="true"></i>
          <span>
            Location
          </span>
        </a>
      </div>

      <div class="info_top ">
        <div class="row info_main_row">
          <div class=" col-md-4 col-lg-4 ">
            <div class="info_about">
              <h4>
                About Us
              </h4>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, vitae. Dolorem incidunt consectetur, recusandae enim officiis mollitia modi consequatur ab non animi provident quis asperiores eius omnis suscipit maiores perferendis?
              </p>
            </div>
          </div>
          <div class=" col-md-4 col-lg-3 mx-auto">
            <div class="info_links">
              <h4>
                QUICK LINKS
              </h4>
              <div class="info_links_menu">
                  <a href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
                  <a href="{{ route('about') }}"> About</a>
                  <a href="{{ route('why') }}">Why Us</a>
                  <a href="{{ route('faq') }}">FAQ</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info_form">
              <h4>
                SIGN UP TO OUR NEWSLETTER
              </h4>
              <form action="">
                <input type="text" placeholder="Enter Your Email" />
                <button type="submit">
                  Subscribe
                </button>
              </form>
              <div class="social_box">
                <a href="">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end info_section -->


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- nice select -->
  <script src="js/jquery.nice-select.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script src="js/custom.js"></script>


</body>

</html>
