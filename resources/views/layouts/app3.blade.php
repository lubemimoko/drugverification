<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
<meta name="author" content="GeeksLabs">
<meta name="keyword" content="Pharm Plus">
<link rel="shortcut icon" href="{{ url('/css/img/favicon.png') }}">

<title>Pharm Plus</title>
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" contnpent="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- <link rel="stylesheet" href="{{ asset('css/cursor.css') }}" defer> -->
<title>pharmPlus - Health &amp; pharmPlus | Home</title>
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" -->
<!-- defer> -->

<!-- Scripts -->
<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" defer> -->


<!-- Favicon  -->
<link rel="icon" href="{{ asset('img/core-img/pharmplus.png') }}">

<link rel="stylesheet" href="{{ asset('font-awesome.min.css') }}" >
<!-- Style CSS -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}" >
<link href="{{ asset('css/style2.css') }}" rel="stylesheet">
<!-- Style CSS -->

</head>

<body>
    <!-- container section start -->
    <section id="container" class="">
        <!--header start-->
        <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom">
                    <i class="icon_menu"></i>
                </div>
            </div>

            <!--logo start-->
            <a href="index.php" class="logo">Nice <span class="lite">Admin</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">

            </div>

            <div class="top-nav notification-row">
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">

                    <!-- user login dropdown start-->
                    <li class="dropdown" style="display:none;">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            <span class="username">Jenifer Smith</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>

                            <li>
                                <a href="login.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>

                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
        </header>
        <!--header end-->

        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu">
                    <li class="">
                        <a class="" href="{{route('admin.home')}}">
                            <i class="icon_house_alt"></i>
                            <span class="text-white">Dashboard</span>
                        </a>
                    </li>

                    <li class="sub-menu active">
                        <a href="{{route('home.logout')}}" class="">
                            <i class="icon_table"></i>
                            <span class="text-white">Logout</span>

                        </a>
                    </li>



                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>

        @yield('content')


    </section>

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
    //knob
    <script>
    $(function() {
        $(".knob").knob({
            'draw': function() {
                $(this.i).val(this.cv + '%')
            }
        })
    });

    //carousel
    $(document).ready(function() {
        $("#owl-slider").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true

        });
    });

    //custom select box

    $(function() {
        $('select.styled').customSelect();
    });

    /* ---------- Map ---------- */
    $(function() {
        $('#map').vectorMap({
            map: 'world_mill_en',
            series: {
                regions: [{
                    values: gdpData,
                    scale: ['#000', '#000'],
                    normalizeFunction: 'polynomial'
                }]
            },
            backgroundColor: '#eef3f7',
            onLabelShow: function(e, el, code) {
                el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
            }
        });
    });
    </script>

</body>

</html>