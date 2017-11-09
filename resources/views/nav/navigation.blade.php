<header class="main_h2">
    <div class="nav-row">
        <div class="mobile-toggle">
        </div>
        <div id="hide" >
            <a class="logo" href="/"> <img src="{{ asset('images/logo.png') }}" class="img-responsive" id="logo"
                                           alt="img-logo"></a>
        </div>
        <nav>
            <ul class="menu">
                <li class="menu-item" id="search-into"><i class="fa fa-search"></i></li>
            </ul>
            <div id="nav-icon" class="bar-pos btn-open ">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="bar-pos"></div>
            <div class="search-wrapper">
                <div class="search-form-wrapper">
                    <form method="POST" action="{{ route('search') }}" class="search-form" accept-charset="UTF-8"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <i class="fa fa-search"></i><input name='search' class="search-field"
                                                    placeholder="Search" onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Search'" type="text"/>
                    </form>
                </div>
            </div>
        </nav>
        <div class="overlay">
            @include('nav.overlay')
        </div>
    </div> <!-- / row -->
</header>
<header class="main_h">
    <div id="">
        <a class="logo" href="/"> <img src="{{ asset('images/logo.png') }}" class="img-responsive" id="logo"
                                       alt="img-logo"></a>
    </div>
    <div class="nav-row">
        <div class="mobile-toggle">
            {{--<span></span>--}}
            {{--<span></span>--}}
            {{--<span></span>--}}
        </div>
        <nav>
            <ul class="menu hide-nav-mob">
                <span class="static-menu-wrapper">
                <li class="menu-item menu-item-static"><a href="/our-story" class="scroll-link">Our Story</a></li>
                <li class="menu-item menu-item-static"><a href="/catalogues" class="scroll-link">Catalogs</a></li>
                <li class="menu-item menu-item-static"><a href="/custom-design-process" class="scroll-link">Custom Process</a></li>
                </span>
            </ul>
            <div class="menu-item icon-nav-search" id="search"><i class="fa fa-search"></i></div>
            <div id="nav-icon2" class="btn-open">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            {{--<div class="bar-pos"><a href="#"><i class="fa fa-bars"></i></a></div>--}}
            <div class="search-wrapper">
                <div class="search-form-wrapper">
                    <form method="POST" action="{{ route('search') }}" class="search-form" accept-charset="UTF-8"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <i class="fa fa-search"></i><input name='search' class="search-field"
                                                           placeholder="Search " onfocus="this.placeholder = ''"
                                                           onblur="this.placeholder = 'Search '" type="text"/>
                    </form>
                </div>
            </div>
        </nav>
        <div class="overlay2">
            @include('nav.overlay')
        </div>
    </div> <!-- / row -->

</header>
