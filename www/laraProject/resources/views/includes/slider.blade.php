<!-- slider section -->
<section class="slider_section layout_padding">
    <div class="slider_bg_box">
        <img src="{{ URL('images/slider-bg.jpg') }}" alt="">
    </div>
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <div class="detail-box">

                                <h1>
                                    Esplora <br>
                                    Catalogo
                                </h1>
                                <div class="col-md-8 px-0">
                                    <p>
                                        Esplora le migliori offerte.
                                    </p>
                                </div>
                                <div class="btn-box">
                                    <a href="{{ route('catalogo') }}" class="btn1">
                                        Esplora
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <div class="detail-box">
                                <h1>
                                    Possiedi un <br>
                                    locale?
                                </h1>
                                <div class="col-md-8 px-0">
                                    @if(!isset(Auth::user()->nome))
                                        <p>
                                            Registrati e pubblica il tuo primo annuncio.
                                        </p>
                                </div>
                                <div class="btn-box">
                                    <a href="{{ route('signup') }}" class="btn1">
                                        Registrati
                                    </a>
                                    @else
                                        <p>
                                            Inizia pubblicando un annuncio.
                                        </p>
                                </div>
                                <div class="btn-box">
                                    <a href="{{ route('signup') }}" class="btn1">
                                        Pubblica
                                    </a>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <div class="detail-box">
                                <h1>
                                    Cerchi <br>
                                    una camera?
                                </h1>
                                <div class="col-md-8 px-0">
                                    @if(!isset(Auth::user()->nome))
                                        <p>
                                            Registrati e prenota subito.
                                        </p>
                                </div>
                                <div class="btn-box">
                                    <a href="{{ route('signup') }}" class="btn1">
                                        Registrati
                                    </a>
                                    @else
                                        <p>
                                            Sfoglia catalogo.
                                        </p>
                                </div>
                                <div class="btn-box">
                                    <a href="{{ route('signup') }}" class="btn1">
                                        Catalogo
                                    </a>
                                    @endif

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <ol class="carousel-indicators">
            <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#customCarousel1" data-slide-to="1"></li>
            <li data-target="#customCarousel1" data-slide-to="2"></li>
        </ol>
    </div>

</section>
<!-- end slider section -->
