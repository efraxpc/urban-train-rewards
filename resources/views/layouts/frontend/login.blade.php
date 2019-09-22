<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.frontend.head')
</head>

<body id="login_bg">

    <nav id="menu" class="fake_menu"></nav>

    <div id="login">
        <aside>
            <figure>
                <a href="index.html"><img src="img/logo_sticky.svg" width="165" height="35" alt=""
                        class="logo_sticky"></a>
            </figure>
            @yield('content')
            <div class="copy">© 2018 Sparker</div>
        </aside>
    </div>

    <!-- COMMON SCRIPTS -->
    <script src="{{ asset('assets/frontend/js/common_scripts.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/functions.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/validate.js') }}"></script>
</body>

</html>