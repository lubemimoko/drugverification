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
<style>*{font-size: 18px;}</style>
@php 
    if(!empty(Auth::user()->role)){
        if(Auth::user()->role =="admin"){
            echo '<div id="main-content" style="padding-top:80px;">';
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
                    <th scope="col">NAFDAC REG NUMBER</th>
                    <th scope="col">DATE REG</th>
                    <th scope="col">MANUFACTURING DATE</th>
                    <th scope="col">EXPRIRING DATE</th>
                    <th scope="col">View Drug</th>

                </tr>
            </thead>
            <tbody>
            @if(count($drugs) > 0)
            <?php $sn=1;?>
                @foreach($drugs as $drug)
                
                {!!
                    
                    $color=""; $status="Active"; $color="text-success";
                    if($drug->status == 0){
                        $color="text-warning";
                        $status="Inactive";    
                    }else if($drug->status == -1){
                        $color="text-danger text-danger";
                        $status="Disabled";
                    }
                !!}
                <tr style="cursor: pointer;">

                    <td class="{{$color}}">{{$sn++}}</td>
                    <td class="{{$color}}"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><img
                                src="{{asset($drug->logo)}}" style="object-fit: cover; width:120px;height:100px"
                                alt=""></button></td>
                    <td class="{{$color}}">{{$drug->drugName}}</td>
                    <td class="{{$color}}">{{$drug->nafdac}}</td>       
                    <td class="{{$color}}">{{$drug->created_at}}</td>             
                    <td class="{{$color}}">{{$drug->manufacturing_date}}</td>
                    <td class="{{$color}}">{{$drug->expiring_date}}</td>
                    <td class="{{$color}}"><a href="{{ route('drugs.edit', $drug->id ) }}">Change</a></td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td><div class="alert alert-danger">No Drugs Found</div></td>
                </tr>   
                @endelse
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
                        <img id="img" src="img/new/world.png" style="  width: 100%;height: 180px;object-fit: cover;" alt="">
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