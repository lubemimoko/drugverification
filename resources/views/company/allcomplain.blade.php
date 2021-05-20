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
* {
    font-size: 18px;
}
</style>
@php
if(!empty(Auth::user()->role)){
if(Auth::user()->role =="admin"){
echo '<div id="main-content">';
    }else{
    echo '<div class="container">';
        echo '<div style="width: 100%; height:200px"></div>';
        }
        }else {
        echo '<div class="container">';
            echo '<div style="width: 100%; height:200px"></div>';
            }
            @endphp


            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">DRUG LOGO</th>
                        <th scope="col">DRUG NAME</th>
                        <th scope="col">ALLERGIES</th>
                        <th scope="col">ADDICTIVE</th>
                        <th scope="col">SIDE EFFECTS</th>
                        <th scope="col">ADDRESS OF SALES</th>
                        <th scope="col">REASON</th>
                        @if(!empty(Auth::user()->role))
                        @if(Auth::user()->role === "admin")
                        <!-- go down and change to admin also-->
                        <th scope="col">Change Status</th>
                        @endif
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($complains))
                    <?php $sn=1;?>
                    @foreach($complains as $complain)

                    @php
                    $color="";$status="Active"; $color="text-success";
                    if($complain->status == 0){
                    $color="text-danger";
                    $status="Inactive";
                    }else if($complain->status == -1){
                    $color="text-danger text-danger";
                    $status="Disabled";
                    }
                    @endphp

                    <tr class="{{$color}}" style="cursor: pointer;">

                        <td>{{$sn++}}</td>

                        @if(empty($drug->logo))
                        <td class="{{$color}}"> <img src="{{asset($complain->logo)}}"
                                style="object-fit: cover; width:120px;height:100px" alt=""> </td>

                        @endif
                        @if(!empty($drug->logo))
                        <td class="{{$color}}"> <img src="{{asset($drug->logo)}}"
                                style="object-fit: cover; width:120px;height:100px" alt=""> </td>

                        @endif
                        @if(!empty($drug->drugName))
                        <td class="{{$color}}">{{$drug->drugName}}???</td>

                        @endif
                        @if(empty($drug->drugName))
                        <td class="{{$color}}">{{$complain->drugName}}---</td>
                        @endif


                        <td>{{$complain->alergies}}</td>
                        <td>{{$complain->addictive}}</td>
                        <td>{{$complain->sideEffect}}</td>
                        <td>{{$complain->addressOfSale}}</td>
                        <td>{{$complain->reason}}</td>

                        @if(!empty(Auth::user()->role)){

                        @if(Auth::user()->role === "admin")
                        <!-- <script> alert("Hi") </script> -->
                        <!-- go up and change to admin also. admin o not company. Just testing -->
                        <td colspan="6"><a href="{{route('complain.edit', $complain->id)}}" class="btn btn-info">Edit
                                Status</td>
                        @endif
                        @endif
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8">
                            <div class="alert alert-danger">No Drugs Found</div>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>


        </div>
        <!-- The Modal -->
        <style>
        .modal {
            margin-top: 5em;
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
                            <h5 class="headline" id="nafdac">BBF:Jan 23, 2018</h5>
                        </div>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="blog-post-thumbnail">
                            <img id="img" src="img/new/world.png" style="  width: 100%;height: 180px;object-fit: cover;"
                                alt="">
                            <!-- Post Date -->
                            <div class="post-date">
                                <h3 class="headline" id="company">COMAPANY NAME: days eye</h3>
                                <h5 class="headline" id="expiring" style="color:red">BBF:Jan 23, 2018</h5>
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

        @endsection
        <script src="{{ URL::asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
        <script>
        //$(document).ready(function(){alert("Hi")});

        function drugmodel(name, logo, expiring, manu, nafdac, company, created) {
            $("#name").text("Drug Name: " + name)
            $("#img").attr("src", logo)
            $("#expiring").text("Expiring Date: " + expiring)
            $("#manu").text(manu)
            $("#nafdac").text("Nafdac: " + nafdac)
            $("#created").text(created)
            $("#company").text(company)
            $("#myModal").modal()

        }
        </script>