<section class="about_section layout_padding3">
    <div class="container  ">
        <div class="row">
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container">
                        <h2>
                            About Us
                        </h2>
                    </div>
                    <p>
                        Siamo una società che nasce con l'intento con l'intento di facilitare gli studenti nella ricerca di un alloggio,
                        facilitando lo scambio di informazioni con il locatore nel modo più facile e chiaro possibile.
                        @if( Request::is('about'))
                            <br><br>
                            Sei uno studente? Registrati subito e cerca l'alloggio più adatto alle tue esigenze.
                            <br><br>
                            Possiedi un locale? Registrati subito e inizia pubblicando il tuo primo annuncio.
                        @endif
                    </p>
                    <a href={{ route('about') }}>
                        Leggi più
                    </a>
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
