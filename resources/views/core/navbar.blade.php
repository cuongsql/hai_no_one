<body data-app="home" class="body-home">

    <div class="bar_loading"></div>
    <nav id="header_nav" class="navbar navbar-default navbar-fixed-top nav-down">
        <div class="container container-home container-home-header" id="header_">
            <div id="navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="logo">
                        <a href="{{ asset('/') }}">
                            <img src="{{ asset('/media/img/logo.png') }}" width="42px">
                        </a>
                    </li>
                    <li class="pp_front_menu @if(request()->routeIs('home')) active @endif" id="home_nav">
                        <a href="{{ asset('/') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="#66757f" class="feather feather-home">
                                <defs xmlns="http://www.w3.org/2000/svg">
                                    <linearGradient x1="19.28%" y1="86.72%" x2="88.05%" y2="12.24%" id="home">
                                        <stop stop-color="#5cb933" offset="0%" />
                                        <stop stop-color="#459522" offset="49.5%" />
                                        <stop stop-color="#41991a" offset="100%" />
                                    </linearGradient>
                                </defs>
                                <path d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" fill="url(#home)" />
                            </svg> <span>Home</span>
                        </a>
                    </li>

                    <li class="pp_front_menu exp_menu" id="explore_nav">
                        <a href="#" onclick="alert('tính năng đang phát triển')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="#66757f" class="feather feather-compass">
                                <path
                                    d="M7,17L10.2,10.2L17,7L13.8,13.8L7,17M12,11.1A0.9,0.9 0 0,0 11.1,12A0.9,0.9 0 0,0 12,12.9A0.9,0.9 0 0,0 12.9,12A0.9,0.9 0 0,0 12,11.1M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4Z" />
                            </svg> <span>Explore</span>
                        </a>
                    </li>

                    <li class="pp_front_menu last_menu" id="store_nav">
                        <a href="{{ asset('/') }}" onclick="alert('tính năng đang phát triển')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                class="feather">
                                <path fill="currentColor"
                                    d="M12,18H6V14H12M21,14V12L20,7H4L3,12V14H4V20H14V14H18V20H20V14M20,4H4V6H20V4Z">
                                </path>
                            </svg> <span>Store</span>
                        </a>
                    </li>

                    <li>
                        <form method="get" class="form navbar-search" action="{{route('search')}}">
                            @csrf
                            <div class="input">
                                <input type="text" class="form-control" placeholder="Search.." name="search"
                                    autocomplete="off">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                                <div class="pp_head_search_loader" id="pp_loader">
                                    <div class="speeding_wheel"></div>
                                </div>
                            </div>
                            <div class="search-result"></div>
                        </form>
                    </li>
                </ul>
                @include('core.navbar-pc')
            </div>

            @include('core.navbar-mobile')

        </div>

        <div class="loadding-pgbar">
            <div class="bar"></div>
        </div>
    </nav>
    <main class="container container-home container-home-main" id="page_content">
        <div class="row">
            <div class="home-page-container">
