@extends('layouts.app2')

@section('content')

<body>
    <!-- ***** Breadcumb Area Start ***** -->
    <section class="breadcumb-area bg-img gradient-background-overlay"
        style="background-image: url(img/new/360_F_143108254_u9kwgSdsfOZm0YQq7RE3gJoT90ifnsgX.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Contact</h3>
                        <p>Get a quick consulation today</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Breadcumb Area End ***** -->

    <section class="medilife-contact-area section-padding-100">
        <div class="container">
            <div class="row">
                <!-- Contact Form Area -->
                <div class="col-12 col-lg-8">
                    <div class="contact-form">
                        <h5 class="mb-50">Get in touch</h5>

                        <form action="#" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="contact-name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="contact-email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" cols="30" rows="10"
                                    placeholder="Message"></textarea>
                            </div>
                            <button disabled type="submit" class="btn medilife-btn btn-block">Send Message
                                <span>+</span></button>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="content-sidebar">


                        <!-- Contact Card -->
                        <div class="medilife-contact-card mb-50">

                            <div class="single-contact d-flex align-items-center">
                                <div class="contact-icon mr-30">
                                    <i class="icon-doctor"></i>
                                </div>
                                <div class="contact-meta">
                                    <p>Address: 1481 Creekside Lane Avila <br>Beach, CA 93424 </p>
                                </div>
                            </div>

                            <div class="single-contact d-flex align-items-center">
                                <div class="contact-icon mr-30">
                                    <i class="icon-doctor"></i>
                                </div>
                                <div class="contact-meta">
                                    <p>Phone: +53 345 7953 32453</p>
                                </div>
                            </div>

                            <div class="single-contact d-flex align-items-center">
                                <div class="contact-icon mr-30">
                                    <i class="icon-doctor"></i>
                                </div>
                                <div class="contact-meta">
                                    <p>Email: yourmail@gmail.com</p>
                                </div>
                            </div>


                            <div class="contact-social-area">
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Maps -->
    <div class="map-area mb-100">

        <div class="row">
            <div class="col-12">
                <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                    id="gmap_canvas"
                    src="https://maps.google.com/maps?width=100%&amp;height=400&amp;hl=en&amp;q=alfa%20bus%20stop%20sangotedo%20ajah%20Lagos+(Pharm%20Plus%20Ltd)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                <a href='https://www.symptoma.es/'>symptom checker spanish</a>
                <script type='text/javascript'
                    src='https://embedmaps.com/google-maps-authorization/script.js?id=794f3ce1342975e51eaf66381fb6958263e5c26e'>
                </script>

            </div>
        </div>
    </div>
    @endsection