<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ asset('css/cursor.css') }}">
        <title>pharmPlus - Health &amp; pharmPlus | Home</title>
        <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" defer>-->

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" defer>


        <!-- Favicon  -->
        <link rel="icon" href="{{ asset('img/core-img/pharmplus.png') }}">

        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>

    <body>

        <!-- BEGININNG OF NAV BAR-->

        <style>
        i.fa.fa-angle-up::before {
            margin-left: -12px !important;
            margin-top: 7px !important;
            float: left;
        }

        @media(max-width:480px) {
            i.fa.fa-angle-up::before {
                margin-left: -5px !important;
                margin-top: -6px !important;
                float: left;
            }
        }
        </style>

        <style>
        * {
            font-size: 18px;
        }

        .bg-warning {
            background-color: #fabb3d !important;
        }
        </style>
        <div class="cursor">
            <div class="cursor-inner cursor-inner--circle"></div>
            <div class="cursor-inner cursor-inner--dot"></div>
        </div>

        <!-- ***** Header Area Start ***** -->
        <header class="header-area">
            <!-- Top Header Area -->
            <div class="top-header-area">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-12 h-100">
                            <div class="h-100 d-md-flex justify-content-between align-items-center">
                                <p>Welcome to <span>PHARM</span>PLUS </p>
                                <p>For Emergency calls : <span>08171045433</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Header Area -->
            <div class="main-header-area" id="stickyHeader">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 h-100">
                            <div class="main-menu h-100">
                                <nav class="navbar h-100 navbar-expand-lg">
                                    <!-- Logo Area  -->
                                    <a class="navbar-brand" href="{{route('home.index')}}"><img
                                            src="{{asset('img/core-img/pharmplus.png')}}" width="30%" alt="Logo"></a>

                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#medilifeMenu" aria-controls="medilifeMenu" aria-expanded="false"
                                        aria-label="Toggle navigation"><span
                                            class="navbar-toggler-icon"></span></button>

                                    <div class="collapse navbar-collapse" id="medilifeMenu">
                                        <!-- Menu Area -->
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item active">
                                                <a class="nav-link" href="{{route('home.index')}}">Check Verication Code
                                                    <span class="sr-only">(current)</span></a>
                                            </li>
                                            @if(!empty(Auth::user()->role))
                                            @if(Auth::user()->role =="company" && Auth::user()->status == 1)
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('drugs.create')}}">Add Drug <i
                                                        class="fa fa-registered"></i>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('drugs.index')}}">All Drugs <i
                                                        class="fa fa-street-view"></i></a>
                                            </li>
                                            <li class="nav-item" style="display:block;">
                                                <a class="nav-link"
                                                    href="{{route('complaindrugs.show', Auth::user()->email )}}">All
                                                    Complains</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="{{route('company.edit', Auth::user()->email ) }}">Edit Bio</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('home.logout')}}">Logout</a>
                                            </li>
                                            @endif
                                            @endif
                                            @guest
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('usercompany.index')}}">Register/Login
                                                    <i class="fa fa-registered"></i>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('usercomplain.show')}}">Drugs With
                                                    Report <i class="fa fa-street-view"></i></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('home.contact')}}">Contact</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('usercomplain.create')}}"
                                                    class="btn medilife-appoint-btn ml-30">Report<span> To
                                                        Us</a>
                                            </li>
                                            @endguest
                                        </ul>

                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- <h1>{{ URL::asset('js/cursor.js') }}</h1> -->
        <!-- ***** Header Area End ***** -->
        @yield("content")




        <!-- ***** Blog Area Start ***** -->
        <div class="medilife-blog-area section-padding-100-0">
            <div class="container">

                <h2>LATEST NEWS AND MOST VIEWED STORES</h2>
                <div class="row">
                    <!-- Single Blog Area -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-blog-area mb-100">
                            <!-- Post Thumbnail -->
                            <div class="blog-post-thumbnail">
                                <img src="img/new/first-aid-908591_640.jpg" alt="">
                                <!-- Post Date -->
                                <div class="post-date">
                                    <a href="#">REG:Jan 23, 2018</a>
                                </div>
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <div class="post-author">
                                    <a href="#"><img src="img/new/med.png" alt=""></a>
                                </div>
                                <a href="#" class="headline">Newly Released Drugs</a>
                                <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod
                                    tincidunt.
                                </p>

                            </div>
                        </div>
                    </div>
                    <!-- Single Blog Area -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-blog-area mb-100">
                            <!-- Post Thumbnail -->
                            <div class="blog-post-thumbnail">
                                <img src="img/new/lady.jpg" alt="">
                                <!-- Post Date -->
                                <div class="post-date">
                                    <a href="#">REG:Jan 23, 2018</a>
                                </div>
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <div class="post-author">
                                    <a href="#"><img src="img/blog-img/p2.jpg" alt=""></a>
                                </div>
                                <a href="#" class="headline">22 gwarinpa Abuja</a>
                                <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod
                                    tincidunt.
                                </p>

                            </div>
                        </div>
                    </div>
                    <!-- Single Blog Area -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-blog-area mb-100">
                            <!-- Post Thumbnail -->
                            <div class="blog-post-thumbnail">
                                <img src="img/new/CulturallyCompetentCare2_1350.jpg" alt="">
                                <!-- Post Date -->
                                <div class="post-date">
                                    <a href="#">REG:Jan 23, 2018</a>
                                </div>
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <div class="post-author">
                                    <a href="#"><img src="img/new//med.png" alt=""></a>
                                </div>
                                <a href="#" class="headline">14 Ajah Lagos</a>
                                <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod
                                    tincidunt.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Blog Area End ***** -->


        <!-- ***** Footer Area Start ***** -->
        <footer class="footer-area section-padding-50">

            <!-- Bottom Footer Area -->
            <div class="bottom-footer-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="bottom-footer-content">
                                <!-- Copywrite Text -->
                                <div class="copywrite-text">
                                    <p><a href="#">PHARM PLUS</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ***** Footer Area End ***** -->

        <!-- jQuery (Necessary for All JavaScript Plugins) -->
        <script src="{{ URL::asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
        <!-- Popper js -->
        <script src="{{ URL::asset('js/popper.min.js') }}"></script>
        <!-- Bootstrap js -->
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        <!-- Plugins js -->
        <script src="{{ URL::asset('js/plugins.js') }}"></script>
        <!-- Active js -->
        <script src="{{ URL::asset('js/active.js') }}"></script>
        <script src="{{ URL::asset('js/cursor.js') }}"></script>
        <script src="{{ URL::asset('js/myJs.js') }}"></script>
        <script>
        setTimeout(() => {
            $("#preloader").hide(100)
        }, 3000);
        </script>

    </body>


</html>