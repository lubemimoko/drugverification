@extends('layouts.app3')

@section('content')
<!--main content start-->
<section id="main-content" style="display: block;">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                    <li><i class="fa fa-laptop"></i>Dashboard</li>
                </ol>
            </div>
        </div>

        <div class="row">
            
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" class="green-bg">
                <a href="{{ route('admincompany.company', '1') }} ">
                    <div class="info-box green-bg">
                        <i class="fa fa-cloud-download"></i>
                        <div class="count">{{$approvedCompanies}}</div> 
                        <div class="title">Active Companies</div> 
                    </div>
                    <!--/.info-box-->
                </a>
            </div>
            <!--/.col-->

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" class="warning-bg">
                
                <a href="{{ route('admincompany.company', '0') }} ">
                    <div class="info-box warning">
                        <i class="fa fa-shopping-cart"></i>
                        <div class="count">{{$unapprovedCompanies}}</div>
                        <div class="title">Inactive Companies</div>
                    </div>
                    <!--/.info-box-->
                </a>
            </div>
            <!--/.col-->

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" class="danger-bg">
                <a href="{{ route('admincompany.company', '-1') }} " style="all: unset !important;">
                    <div class="info-box danger">
                        <i class="fa fa-thumbs-o-up"></i>
                        <div class="count">{{$disabledCompanies}}</div>
                        <div class="title">Disabled Companies</div>
                    </div>
                <!--/.info-box-->
                </a>
            </div>
            <!--/.col-->

            </div>
        <!--/.row-->

        <div class="row">
            
            <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12" class="green-bg">
                <a href="{{ route('admincompany.complains', '1') }} ">
                    <div class="info-box green-bg">
                        <i class="fa fa-cubes"></i>
                        <div class="count">{{$approvedComplains}}</div>
                        <div class="title">Approved Complains</div>
                    </div>
                    <!--/.info-box-->
                </a>
            </div>
            <!--/.col-->

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" class="danger-bg">
                <a href="{{ route('admincompany.complains', '0') }} ">
                    <div class="info-box danger">
                        <i class="fa fa-cloud-download"></i>
                        <div class="count">{{$unapprovedComplains}}</div>
                        <div class="title">New/ Unapproved Complains</div>
                    </div>
                    <!--/.info-box-->
                </a>
            </div>
            <!--/.col-->

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="display:none;">
                <div class="info-box green-bg">
                    <i class="fa fa-cubes"></i>
                    <div class="count">{{$unapprovedComplains}}</div>
                    <div class="title">Generated Codes</div>
                </div>
                <!--/.info-box-->
            </div>
            <!--/.col-->

        </div>
        <!--/.row-->


        <div class="row" style="display: none;">
            <div class="col-lg-12 col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body-map">
                        <div id="map" style="height:380px;"></div>
                    </div>

                </div>
            </div>


        </div>
    </section>

</section>
@endsection