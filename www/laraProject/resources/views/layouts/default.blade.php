<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="hero_area">
    <header class="header_section">
        <div class="container-fluid">
            @include('includes.navbar')
        </div>

    </header>
    @if(Request::is('test2')||Request::is('index'))
    @yield('carousel')
    @endif

</div>

<div id="main">
    @yield('content')

    <footer class="footer_section">
        @include('includes.footer')
    </footer>

    @include('includes.jsScript')



</div>
</body>
</html>
