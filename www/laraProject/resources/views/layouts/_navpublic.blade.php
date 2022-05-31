<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav  ">
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('index') }}"> Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('catalogo') }}"> Catalogo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('about') }}"> About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('why') }}"> Why Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
        </li>

    </ul>
    @if(isset(Auth::user()->nome))
        <div class="quote_btn-container">
            <a href="{{ route('profile') }}" class="quote_btn">
                {{ Auth::user()->nome }}
            </a>
        </div>
        &nbsp
        <div class="quote_btn-container">
            <a href="{{ route('logout') }}" class="quote_btn">
                LOGOUT
            </a>
        </div>
    @else
        <div class="quote_btn-container">
            <a href="{{ route('login') }}" class="quote_btn">
                LOG IN
            </a>
        </div>
        &nbsp;
        <div class="quote_btn-container">
            <a href="{{ route('signup') }}" class="quote_btn">
                SIGN UP
            </a>
        </div>
    @endif

</div>
