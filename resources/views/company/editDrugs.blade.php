@php 
    if(!empty(Auth::user()->role)){
        if(Auth::user()->role =="admin"){
        $layout="layouts.app3";
        }else{
            $layout="layouts.app2";
        }
    }else {
        $layout="layouts.app2";
    }
@endphp
@extends($layout)

@section('content')
<style>
input {
    width: 100% !important;
}
*{
    color:black;
}
</style>
@php 
    if(!empty(Auth::user()->role)){
        if(Auth::user()->role =="admin"){
            echo '<div id="main-content" style="padding:80px;">';
        }else{
            echo '<div class="container">';
            echo '<div style="width: 100%; height:200px"></div>';    
        }
    }else {
       echo '<div class="container">';
        echo '<div style="width: 100%; height:200px"></div>';
    }
@endphp

    <div class="row">
        <div class="form-inline">
            <form method="POST" action="{{route('drugs.update', $drug->id )}}" enctype="multipart/form-data">

                @csrf
                @if(Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif

                <div class="form-group row" style="">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">

                        <input type="hidden" name="_method" value="PUT">
                        <img src="{{asset($drug->logo)}}" class="img img-circle" height="300px;"
                            style="object-fit:cover;">
                    </div>

                </div>

                <div class="col-xs-12">
                    <div class="col-xs-5 col-xs-offset-1 well">
                        <div class="form-group">
                            <label for="drug">Drug:</label>
                            <input type="text" value="{{ $drug->drugName }}" class="form-control" name="name" id="name"
                                required placeholder="Enter drugs name"> 
                                @error('name') <span class="invalid-feedback"
                                role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-5 col-xs-offset-1 well">
                        <div class="form-group">
                            <label for="logo">Drug Picture:</label>
                            <input type="file" class="form-control" name="logo" id="logo">
                        </div>

                        @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-xs-5 col-xs-offset-1 well">
                        <div class="form-group">
                            <label for="nafdac">Nafdac Num:</label>
                            <input required type="text" placeholder="Enter NAFDAC Reg Num:" class="form-control"
                                name="nafdac" value="{{ $drug->nafdac }}" id="nafdac">

                            @error('nafdac')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-5 col-xs-offset-1 well">
                        <div class="form-group">
                            <label for="Nafdac">Manufacturing Date:</label>
                            <input required type="date" placeholder="Enter Date Of Manufacturing:" class="form-control"
                                name="manufacturing_date" value="{{ $drug->manufacturing_date }}"
                                id="manufacturing_date">

                            @error('manufacturing_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-5 col-xs-offset-1 well">
                        <div class="form-group">
                            <label for="Nafdac">Expiring Date:</label>
                            <input required type="date" placeholder="Enter Best Before Date:" class="form-control"
                                name="expiring_date" id="expiring_date" value="{{ $drug->expiring_date }}">

                            @error('expiring_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                @if(!empty(Auth::user()->role))
                   @if(Auth::user()->role =="admin")
                   <div class="col-xs-5 col-xs-offset-1 well">
                        <div class="form-group">
                    
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <select name="status" id="status">
                                    <?php
                                    $status="active";
                                    $status2 = "inactive";
                                    $value=-1;
                                   if($drug->status != 1){
                                        $status="inactive";
                                        $value=1;
                                        $status2="active";
                                 }?>
                                    <option value="{{$drug->status}}">{{$status}}</option>

                                    <option value="{{$value}}">{{$status2}}</option>
                                </select>
                      
                                @error('expiring_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                            @endif
                        @endif

                <div class="col-xs-11 col-xs-offset-1">
                    <div class="form-group">
                        <input type="submit" value="EDIT Details" class="form-control"
                            style="background-color: #006cff;" name="submit" id="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- ***** In Stock Ends  here ***** -->
    <div class="medilife-blog-area section-padding-100-0" style="display:none;">
        <div class="container-fluid">
            <h1>ALL YOUR REGISTERED STOCK IN STORE (LATEST)</h1>
            <div class="row">
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="single-blog-area mb-100">
                        <!-- Post Thumbnail -->
                        <div class="blog-post-thumbnail">
                            <img src="img/new/capsule.jpg" style="  width: 100%;height: 400px;object-fit: cover;"
                                alt="">
                            <!-- manufacturing and Expiring date -->
                            <div class="post-date">
                                <h3 class="headline">COAMPANY NAME: days eye</h3>
                                <h5 class="headline">BBF:Jan 23, 2018</h5>
                            </div>
                        </div>
                        <!-- Post Content -->
                        <!-- Post Content -->
                        <div class="post-content">
                            <h4 class="headline">ADDRESS: <span> 22 gwarinpa Abuja</span></h4>
                            <p>DRUG CODE: <span style="color:red">2453DGR4</span> </p>
                            <p>DRUG NAME: <span style="color:red">syndrine</span> </p>

                        </div>
                    </div>
                </div>
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="single-blog-area mb-100">
                        <!-- Post Thumbnail -->
                        <div class="blog-post-thumbnail">
                            <img src="img/new/world.png" style="  width: 100%;height: 400px;object-fit: cover;" alt="">
                            <!-- Post Date -->
                            <div class="post-date">
                                <h3 class="headline">COMAPANY NAME: days eye</h3>
                                <h5 class="headline">BBF:Jan 23, 2018</h5>
                            </div>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <h4 class="headline">ADDRESS: <span> 22 gwarinpa Abuja</span></h4>
                            <p>DRUG CODE: <span style="color:red">2453DGR4</span> </p>
                            <p>DRUG NAME: <span style="color:red">syndrine</span> </p>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ***** In Stock Ends  here ***** -->
</div>
<hr>

@endsection
<!-- jQuery (Necessary for All JavaScript Plugins) -->