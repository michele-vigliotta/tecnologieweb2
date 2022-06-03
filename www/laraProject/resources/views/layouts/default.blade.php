<!doctype html>
<html>
<head>
    @include('includes.head')
    @yield('optionalStyle')
</head>
<body>
<div class="hero_area2">
    <header class="header_section">
        <div class="container-fluid">
            @include('includes.navbar')
        </div>

    </header>
</div>

@yield('carousel')

<div id="main">
    @yield('content')

    <footer class="footer_section">
        @include('includes.footer')
    </footer>

    @include('includes.jsScript')



</div>
</body>
</html>
