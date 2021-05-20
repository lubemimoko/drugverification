@extends('layouts.app2')

@section('content')

<style>
input {
    width: 100% !important;
}


.nav {
    left: 10%;
    margin-left: -50px;
    /* top: -13px; */
    position: absolute;
    background-color: #ccc;
    width: 100%;
}


.nav>li>a:hover,
.nav>li>a:focus,
.nav .open>a,
.nav .open>a:hover,
.nav .open>a:focus {
    background-color: #ccc;
}

.dropdown {

    border: 1px solid #ccc;
    border-radius: 4px;
    max-width: 100%;
}

.dropdown-menu>li>a {
    color: #ffffff;
}

.dropdown ul.dropdown-menu {
    border-radius: 4px;
    box-shadow: none;
    margin-top: 20px;
    width: 100%;
    background-color: #9aa5c8;
}

.dropdown ul.dropdown-menu:before {
    content: "";
    border-bottom: 10px solid #fff;
    border-right: 10px solid transparent;
    border-left: 10px solid transparent;
    position: absolute;
    top: -10px;
    right: 16px;
    z-index: 10;
    background-color: #9aa5c8;
}

.dropdown ul.dropdown-menu:after {
    content: "";
    border-bottom: 12px solid #ccc;
    border-right: 12px solid transparent;
    border-left: 12px solid transparent;
    position: absolute;
    top: -12px;
    right: 14px;
    z-index: 9;
    background-color: #9aa5c8;
}
</style>

<body>


    <div class="container">
        <div style="width: 100%; height:200px"></div>
        <div class="row">
            <div class="form-inline">
                <form action="{{route('usercomplain.store')}}" method="post">
                    @csrf

                    <div class="col-xs-12">
                        @if(Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @endif


                        <div class="col-xs-5 col-xs-offset-1 well">
                            <div class="form-group">

                                <select name="drugID" id="drugID" required>
                                    <option value="">SELECT DRUG</option>
                                    @if(count($drugs) > 0)
                                    @foreach($drugs as $drug)

                                    <option value="{{$drug->id}}">{{ $drug->drugName}}</option>

                                    @endforeach
                                    @else
                                    <option value="">No Drug Yet</option>
                                    @endelse
                                    @endif
                                </select>
                            </div>
                            <div class="col-xs-5 col-xs-offset-1 well">
                                <div class="form-group">

                                    <textarea name="reason" placeholder="Give us Hints Why We Should Flag This Drugs"
                                        class="form-control" id="reason" cols="60" rows="30" required></textarea>

                                    @error('reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="col-xs-5 col-xs-offset-1 well">
                            <div class="form-group">
                                <h4>Side Effects:</h4>

                                <input type="radio" value="Severe" class="form-control" name="sideEffect"
                                    id="sideEffect">
                                <label for="" style="margin: -40px 0px 0px 80px;">SEVERE:</label>

                                <input type="radio" value="Minor" class="form-control" name="sideEffect"
                                    id="sideEffect">
                                <label for="" style="margin: -40px 0px 0px 80px;">MINOR:</label>

                                @error('sideEffect')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-5 col-xs-offset-1 well">
                            <div class="form-group">
                                <h4>Allergies:</h4>

                                <input type="radio" value="Yes" class="form-control" name="alergies" id="alergies">
                                <label for="" style="margin: -40px 0px 0px 80px;">YES:</label>

                                <input type="radio" value="No" class="form-control" name="alergies" id="alergies">
                                <label for="" style="margin: -40px 0px 0px 80px;">NO:</label>

                                @error('alergies')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xs-5 col-xs-offset-1 well">
                            <div class="form-group">
                                <h4>Addictive:</h4>

                                <input type="radio" value="Yes" class="form-control" name="addictive" id="addictive">
                                <label for="" style="margin: -40px 0px 0px 80px;">YES:</label>

                                <input type="radio" value="No" class="form-control" name="addictive" id="addictive">
                                <label for="" style="margin: -40px 0px 0px 80px;">NO:</label>

                                @error('addictive')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xs-5 col-xs-offset-1 well">
                            <div class="form-group">
                                <label for="Nafdac"> Address of Purchase:</label>
                                <input type="text" placeholder="Enter the Location Where you made purchase:"
                                    class="form-control" name="addressOfSale" id="addressOfSale" required>

                                @error('addressOfSale')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="col-xs-11 col-xs-offset-1">
                        <div class="form-group">
                            <input type="submit" value="Submit Report" class="form-control"
                                style="background-color: rgb(212, 0, 0);" name="" id="">
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <hr>
    @endsection