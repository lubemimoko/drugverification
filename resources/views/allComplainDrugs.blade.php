@extends('layouts.app2')

@section('content')
<style>
* {
    font-size: 18px;
}
</style>
<div class="container">
    <div style="width: 100%; height:200px"></div>


    <h2 class="text-info" style="font-size:33px">All Drugs In <span class="text-success"
            style="font-size:40px">Green</span> Are Approved For
        Consumption Regardless.
    </h2>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">S/N</th>
                <th scope="col">DRUG LOGO</th>
                <th scope="col">DRUG NAME</th>
                <th scope="col">NAFDAC REG NUMBER</th>
                <th scope="col">MANUFACTURING DATE</th>
                <th scope="col">EXPRIRING DATE</th>
                <th scope="col">VIEW REPORTS</th>

            </tr>
        </thead>
        <tbody>
            @if(count($complains) > 0)
            <?php $sn=1;?>
            @foreach($complains as $complain)

            @php
            if(!empty($complain->drug->status)){
            $color="text-success";
            if($complain->drug->status == 0){
            $color="text-warning";

            }else if($complain->drug->status == -1){
            $color="text-danger";
            }
            @endphp
            <tr style="cursor: pointer;">

                <td class="{{$color}}">{{$sn++}}</td>

                @if(empty($drug->logo))
                <td class="{{$color}}"> <img src="{{asset($complain->drug->logo)}}"
                        style="object-fit: cover; width:120px;height:100px" alt=""> </td>

                @endif
                @if(!empty($drug->logo))
                <td class="{{$color}}"> <img src="{{asset($complain->drug->logo)}}"
                        style="object-fit: cover; width:120px;height:100px" alt=""> </td>
                @endif

                @if(!empty($drug->drugName))
                <td class="{{$color}}">{{$drug->drugName}}</td>

                @endif
                @if(empty($drug->drugName))
                <td class="{{$color}}">{{$complain->drug->name}}</td>
                @endif

                <td class="{{$color}}">{{$complain->drug->nafdac}}</td>
                <td class="{{$color}}">{{$complain->drug->manufacturing_date}}</td>
                <td class="{{$color}}">{{$complain->drug->expiring_date}}</td>
                @if(!empty(Auth::user()->id))
                <td class="{{$color}}"><a href="{{ route('complain.show', $complain->drug->id)}}"
                        class="btn btn-info">Complain</td>
                @else
                <td class="{{$color}}"><a href="{{ route('usersinglecomplain.show', $complain->drug->id)}}"
                        class="btn btn-info">Complain</td>
                @endelse
                @endif
            </tr>
            @php
            }else{

            $color="text-success";
            if($complain->status == 0){
            $color="text-warning";

            }else if($complain->status == -1){
            $color="text-danger";
            }
            @endphp
            <tr style="cursor: pointer;">

                <td class="{{$color}}">{{$sn++}}</td>
                <td class="{{$color}}"> <img src="{{asset($complain->logo)}}"
                        style="object-fit: cover; width:120px;height:100px" alt=""> </td>
                <td class="{{$color}}">{{$complain->drugName}}</td>
                <td class="{{$color}}">{{$complain->nafdac}}</td>
                <td class="{{$color}}">{{$complain->manufacturing_date}}</td>
                <td class="{{$color}}">{{$complain->expiring_date}}</td>
                @if(!empty(Auth::user()->id))
                <td class="{{$color}}"><a href="{{ route('complain.show', $complain->id)}}"
                        class="btn btn-info">Complain</td>
                @else
                <td class="{{$color}}"><a href="{{ route('usersinglecomplain.show', $complain->id)}}"
                        class="btn btn-info">Complain</td>

                @endif
            </tr>
            @php
            }
            @endphp

            @endforeach
            @else
            <tr>
                <td colspan="6">
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