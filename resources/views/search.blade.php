@extends('layouts.app2')

@section('content')

<style>
.hero-slides-content {
    background-color: #07051a;
    height: 100px !important;
}

form, #myUL {
    background-color: #07051a;
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    transition: all 1s;
    width: 250px;
    left: 50%;
    height: 50px;
    background: white;
    box-sizing: border-box;
    border-radius: 25px;
    border: 4px solid white;
    padding: 5px;
}
#myUL {
    transform: translate(-50%, -50%);
    transition: all 1s;
    width: 550px;
    height: 50px;
    margin-left: -10px;
    background: white;
    border-radius: 25px;
}

input {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 42.5px;
    line-height: 30px;
    outline: 0;
    border: 0;
    display: none;
    font-size: 1em;
    border-radius: 20px;
    padding: 0 20px;
}

.fa {
    box-sizing: border-box;
    padding: 10px;
    width: 42.5px;
    height: 42.5px;
    position: absolute;
    top: 0;
    right: 0;
    border-radius: 50%;
    color: #07051a;
    text-align: center;
    font-size: 1.2em;
    transition: all 1s;
}

form:hover, #myUL:hover {
    width: 600px;
    cursor: pointer;
}

form:hover input, #myUL:hover {
    display: block;
}

form:hover .fa {
    background: #07051a;
    color: white;
}
</style>
<style>
#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 10px 0px 0px 0px;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px 12px 12px 0;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style>

 <!-- Preloader -->
 <div class="cursor">
            <div class="cursor-inner cursor-inner--circle"></div>
            <div class="cursor-inner cursor-inner--dot"></div>
        </div>
        <div id="preloader" style="display:none;">
            <div class="pharmplus-load"></div>
        </div>

        
<!-- ***** Hero Area Start ***** -->
<section class="hero-area">
    <div class="hero-slides owl-carousel">
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img bg-overlay-white" style="background-image: url(img/new/woman.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <h1 data-animation="fadeInUp" data-delay="100ms" style="text-align: center!important;">CHECK
                            VALIDITY OF DRUG VIA CODE</h1>
                        <h5 data-animation="fadeInUp" data-delay="100ms" style="text-align: center!important;">ENTER
                            CODE BELOW..</h5>
                        <div class="hero-slides-content">
                            <form action="" id="searchForm">
                            @csrf
                            <input type="hidden" name="_method" value="post">
                            <input type="hidden" id="route" value="{{ route('drugs.search1', '-') }}">
                        
                                <input type="search" id="search" autocomplete="FALSE" onblur="leaveFocus()" onkeyup="searchJS(event)"><button type="button" onclick="mainSearch()" data-toggle="modal" data-target="#myModal2">
                                <ul id="myUL" style="margin-top:60px;display:none;">
                                    <li><a href="#">Adele</a></li>
                                   
                                </ul>
                                    <i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img bg-overlay-white" style="display:none;background-image: url(img/new/vaccine.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <h1 data-animation="fadeInUp" data-delay="100ms" style="text-align: center!important;">CHECK
                            VALIDITY OF DRUG VIA CODE</h1>
                        <h5 data-animation="fadeInUp" data-delay="100ms" style="text-align: center!important;">ENTER
                            CODE BELOW..</h5>
                        <div class="hero-slides-content">
                            <form action="" id="searchForm">
                            @csrf
                            <input type="hidden" name="_method" value="post">
                            <input type="hidden" id="route" value="{{ route('drugs.search1', '-') }}">
                        
                            <input type="search" id="search" onkeyup="searchJS(event)">
                                <i class="fa fa-search"></i>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    
    <!-- The Modal -->
    <style>
    .modal {
        margin-top: 7em;
        width: 100% !important;
        height: 600px !important;
    }

    .modal-dialog {
        width: 100% !important;
    }
    </style>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <div class="post-date">
                        <h3 class="headline" id="name">COMAPANY NAME: days eye</h3>
                        <h4 class="headline" id="nafdac">BBF:Jan 23, 2018</h4>
                        <h4 class="headline" id="status">BBF:Jan 23, 2018</h4>
                    </div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="blog-post-thumbnail">
                        <img id="img" src="img/new/world.png" style="  width: 100%;height: 180px;object-fit: cover;" alt="">
                        <!-- Post Date -->
                        <div class="post-date">
                            <h3 class="headline" id="company">COMAPANY NAME: days eye</h3>
                            <h4 class="headline" id="expiring" style="color:red">BBF:Jan 23, 2018</h4>
                            <h4 class="headline" id="complain"> </h4>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <div class="post-content">
                        <!-- <h4 class="headline" id=>ADDRESS: <span> 22 gwarinpa Abuja</span></h4> -->
                        <p>Manufacturing Date: <span class="text-secondary" id="manu">2453DGR4</span> </p>
                        <p>Date Added: <span class="text-secondary" id="created">syndrine</span> </p>

                    </div>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <hr>


<script src="{{ URL::asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
    <script> //$(document).ready(function(){alert("Hi")});

        function drugmodel(name, logo, expiring, manu, nafdac, company,created){
            $("#name").text("Drug Name: "+name)
            $("#img").attr("src",  logo  )
            $("#expiring").text("Expiring Date: "+expiring)
            $("#manu").text(manu)
            $("#nafdac").text("Nafdac: "+nafdac)
            $("#created").text(created)
            $("#company").text(company)
            $("#myModal").modal()
        
        }
        

    </script>
<!-- ***** Hero Area End ***** -->


<!-- ***** Features Area Start ***** -->
<div class="medilife-features-area section-padding-100">
    <div class="container">
        <div class="row align-items-center">
            <h2>A new way to acertain the Authenticity of any Pharmaceutical Drug</h2>
            <div class="col-12 col-lg-6">
                <div class="features-content">
                    <p>The scope of pharmacy practice includes more traditional roles such as compounding and
                        dispensing of medications, and it also includes more modern services related to health care,
                        including clinical services, reviewing medications for safety and efficacy, and providing
                        drug information. Pharmacists, therefore, <span style="color: blue;">PharmPlus </span> are
                        the experts on drug therapy and are the
                        primary health professionals who optimize the use of medication for the benefit of the
                        patients. So be sure to get the right and prescribed drugs from the accurate store. Your
                        wellbeing matters to us.</p>
                    <a href="#" class="btn medilife-btn mt-50">View Trusted Stores <span>+</span></a>
                </div>
            </div>
            <div class="col-12 col-lg-6" style="margin-top: -50px;">
                <div class="features-thumbnail">
                    <img src="img/new/black.jpg" alt="" style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection