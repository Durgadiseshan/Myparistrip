<!-- resources/views/layouts/theme/header.blade.php -->
<!-- inner style link start -->
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<link href="{{ asset('css/signup.css') }}" rel="stylesheet">
<!-- inner style link end -->
<div class="banner-bg">
    <!-- header seaction start -->
    <div class="row m-0 align-items-center p-3">
            <div class="col-xl-3 col-lg-12 col-md-12">
                <div class="d-flex justify-content-between align-items-center">
                    <img src="./images/logo.svg" />                   
                    <span class="d-lg-none" style="font-size:30px;cursor:pointer;color:#fff"
                        onclick="openNav()">&#9776;</span>
                </div>
            </div>
            <div class="col-xl-9 col-lg-12 col-md-12 sidenav" id="mySidenav">
                <div class="d-flex justify-content-left justify-content-lg-end text-white lang-chag">Lang</div>
                <div class="">
                    @if (Route::has('login'))
                        <div class="sm:top-0 sm:right-0 text-left text-lg-right z-10 mt-4 mt-lg-0 px-3 px-lg-0">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white  focus:rounded-sm focus:outline-red-500">Dashboard</a>
                            @else
                                {{-- <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white  focus:rounded-sm focus:outline-red-500">Log in</a> --}}
                                <a href="" data-toggle="modal" data-target="#signin" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white  focus:rounded-sm focus:outline-red-500 text-white text-decoration-none">Log in</a>

                                @if (Route::has('register'))
                                    <a href="" data-toggle="modal" data-target="#signup" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white  focus:rounded-sm focus:outline-red-500 text-white text-decoration-none">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif            
                </div>
                <div>
                    <ul class="header-nav">
                        <li><a href="javascript:void(0)" class="closebtn d-lg-none" onclick="closeNav()">&times;</a>
                        </li>
                        <li><a href="#" class="active">Home</a></li>
                        <li><a href="#">Rental cars</a></li>
                        <li><a href="#">Tour Packages</a></li>
                        <li><a href="#">Events Now</a></li>
                        <li><a href="#">Reviews</a></li>
                        <li><a href="#">Contact</a></li>
                        <li>
                            <button class="manage-btn">
                                Create Account or Login 
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <!-- header seaction end -->
    <!-- banner seaction start -->
    <div class="banner-seaction">
        <div class="container common-container mt-5">
            <div class="col-12 text-center">                
                <img src="{{ asset('images/MyParis.svg') }}" alt="logo" class="banner-logo">
                <p class="text-center text-white make-your">Let’s Make Your best trip Ever !</p>
                <p class="text-center text-white make-your-sub">Traveling with outstanding services and cars</p>
            </div>
            <div class="col-12 banner-tabs">
                <div style="width: 100%;overflow-x: auto;border-radius: 25px;z-index: 9;position: relative;">
                    <!-- Nav pills -->
                    <ul class="outer-tab nav nav-pills justify-content-center"" role=" tablist">
                        <li class="nav-item outer-li">
                            <a class="nav-link" data-toggle="pill" href="#home">
                                <div class="h-100 d-flex flex-column justify-content-center align-items-center">                                   
                                    <img src="{{ asset('images/Search-Icon.svg') }}">
                                    <p class="m-0">Search</p>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" style=" border-top-left-radius: 25px;border-bottom-left-radius: 25px;">
                            <a class="nav-link active" data-toggle="pill" href="#menu1">
                                <div>                                    
                                    <img src="{{ asset('images/pepicons-print_car.svg') }}">
                                    <p>Cab</p>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#menu2">
                                <div>                                   
                                    <img src="{{ asset('images/world.svg') }}">
                                    <p>Tour Packages</p>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#menu3">
                                <div>                                   
                                    <img src="{{ asset('images/pepicons-print_ticket.svg') }}">
                                    <p>Events Now</p>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" style="border-top-right-radius: 25px;border-bottom-right-radius: 25px">
                            <a class="nav-link" data-toggle="pill" href="#menu4">
                                <div>                                    
                                    <img src="{{ asset('images/pepicons-print_map.svg') }}">
                                    <p>Activities</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="home" class="tab-pane fade">
                        <div>
                            <div class="tab1-inner">
                                <div>
                                    <img src="{{ asset('images/location.svg') }}"><span>Where you want to go :</span>
                                    <input type="text" placeholder="Disneyland" />
                                </div>
                                <button><img src="{{ asset('images/search-samll.svg') }}">Search</button>
                            </div>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane active">
                        <div class="tabs-inner ">
                            <div class="row pickup-sec">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                    <div class="form-group">
                                        <label>Pick-up Location</label>
                                        <div class="pick-input">                                            
                                            <img src="{{ asset('images/location.svg') }}">
                                            <input type="text" class="form-control"
                                                placeholder="Charle de Gaulle CDG - Airport">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                    <div class="form-group">
                                        <label>Drop-off Location</label>
                                        <div class="pick-input">
                                            <img src="{{ asset('images/location.svg') }}">
                                            <input type="text" class="form-control" placeholder="Versaille">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <div class="pick-input">
                                            <img src="{{ asset('images/location.svg') }}">
                                            <input type="text" class="form-control"
                                                placeholder="Charle de Gaulle CDG - Airport">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <br>
                        <h3>Menu 2</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem aperiam.
                        </p>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                        <br>
                        <h3>Menu 3</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem aperiam.
                        </p>
                    </div>
                    <div id="menu4" class="tab-pane fade">
                        <br>
                        <h3>Menu 4</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem aperiam.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner seaction end -->
</div>