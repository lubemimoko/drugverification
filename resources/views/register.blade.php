@extends('layouts.app2')

@section('content')
<link rel="stylesheet" href="{{asset('css/register.css')}}">

<!-- <body> -->


<!-- ***** mouse cursor ***** -->

<div class="cursor">
    <div class="cursor-inner cursor-inner--circle"></div>
    <div class="cursor-inner cursor-inner--dot"></div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<div class="body">
    <div class="veen">
        <div class="login-btn splits">
            <p>Already an user?</p>
            <button class="active">Login</button>
        </div>
        <div class="rgstr-btn splits">
            <p>Don't have an account?</p>
            <button>Register</button>
        </div>
        <div class="wrapper" style="margin-top: 100px;">
            <!--            <form id="login" tabindex="502">-->
            <form id="login" method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                @csrf
                @if(Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif
                @if(Session::has('errormessage'))
                <p class="alert alert-danger">{{ Session::get('errormessage') }}</p>
                @endif

                <h3>Login</h3>
                <div class="mail">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <!--                    <input type="mail" name="">-->

                    <!--                    <label>Mail or Username</label>-->
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                </div>
                <div class="passwd">
                    <!--                    <input type="password" name="">-->
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <!--                    <label>Password</label>-->
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                </div>
                <div class="submit">
                    <button class="dark">Login</button>
                </div>
            </form>

            <!-- REGISTER DESIGN-->
            <form method="POST" action="{{ route('usercompany.store') }}" enctype="multipart/form-data" id="register"
                tabindex="510" style="height: auto !important; margin-top:150px;">

                @csrf
                @if(Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif
                @if(Session::has('errormessage'))
                <p class="alert alert-danger">{{ Session::get('errormessage') }}</p>
                @endif

                <h3>Register</h3>
                <div class="name">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>
                </div>
                <div class="mail">
                    <!--                    <input type="mail" name="">-->
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <!--                    <label>Mail</label>-->
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                </div>

                <div class="passwd">
                    <!--                    <input type="password" name="">-->
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <!--                    <label>Password</label>-->
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                </div>

                <div class="passwd">
                    <!--                    <input type="password" name="">-->
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">

                    <!--                    <label>Password</label>-->
                    <label for="password-confirm"
                        class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                </div>

                <div class="mail">
                    <!--                    <input type="mail" name="">-->
                    <input id="logo" type="file" class="form-control" name="logo" required autocomplete="logo">
                    @error('logo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <!--                    <label>Mail</label>-->
                    <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>
                </div>
                <div class="mail">
                    <!--                    <input type="mail" name="">-->
                    <textarea id="address" class="form-control" name="address" required
                        autocomplete="address"></textarea>
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <!--                    <label>Mail</label>-->
                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                </div>

                <div class="submit">
                    <button class="dark">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="{{ URL::asset('js/jquery/jquery-2.2.4.min.js') }}"></script>

<script>
$(document).ready(function() {
    $(".veen .rgstr-btn button").click(function() {
        $('.veen .wrapper').addClass('move');
        $('.body').css('background', 'url(img/new/woman.jpg);');
        $(".veen .login-btn button").removeClass('active');
        $(this).addClass('active');

    });
    $(".veen .login-btn button").click(function() {
        $('.veen .wrapper').removeClass('move');
        $('.body').css('background', 'url(img/new/woman.jpg);');
        $(".veen .rgstr-btn button").removeClass('active');
        $(this).addClass('active');
    });
});
</script>