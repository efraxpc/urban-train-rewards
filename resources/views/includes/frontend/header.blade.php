<header class="header_in">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div id="logo">
                    <a href="index.html">
                        <img src="img/logo_sticky.svg" width="165" height="35" alt="" class="logo_sticky">
                    </a>
                </div>
            </div>
            <div class="col-lg-9 col-12">
                <ul id="top_menu">
                    <li><a href="#" class="btn_add">Add Listing</a></li>
                    @guest
                    <li><a href="{{ route('login') }}" class="login" title="Sign In">Sign In</a></li>
                    @endguest
                    
                    @if (auth()->check())
                        @if (auth()->user()->isAdministrator())
                        <a href="{{ url('/backend/offers') }}">
                            <i class="fas fa-columns fa-2x my-1"></i>
                        </a>
                        @else
                        <a href="{{ url('/dashboard') }}">
                            <i class="fas fa-columns fa-2x my-1"></i>
                        </a>
                        @endif
                    @endif
                    @auth
                    <li></li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        <i class="fas fa-running fa-2x my-1"></i>
                    </a>
                    </li>
                    @endauth
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <!-- /top_menu -->
                <a href="#menu" class="btn_mobile">
                    <div class="hamburger hamburger--spin" id="hamburger">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
                <nav id="menu" class="main-menu">
                    <ul>
                        <li>
                            <span><a href="{{ url('/') }}">Home</a></span>
                        </li>
                    </ul>

                </nav>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    <!-- search_mobile -->
    <div class="layer"></div>
    <div id="search_mobile">
        <a href="#" class="side_panel"><i class="icon_close"></i></a>
        <div class="custom-search-input-2">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="What are you looking..">
                <i class="icon_search"></i>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Where">
                <i class="icon_pin_alt"></i>
            </div>
            <select class="wide">
                <option>All Categories</option>
                <option>Shops</option>
                <option>Hotels</option>
                <option>Restaurants</option>
                <option>Bars</option>
                <option>Events</option>
                <option>Fitness</option>
            </select>
            <input type="submit" value="Search">
        </div>
    </div>
    <!-- /search_mobile -->
</header>
<!-- /header -->