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
   <div id="main-content" style="padding-top:80px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('EDIT PAGE') }}</div>
                <!-- {{ route('company.store') }} -->
                <div class="card-body">
                    <form method="POST" action="{{route('admincompany.update', $company->id)}}" enctype="multipart/form-data">
                        @csrf
                        @if(Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @endif
                        <div class="form-group row">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">

                                <input type="hidden" name="_method" value="PUT">
                                <img src="{{asset($company->logo)}}" class="img img-circle" height="300px;"
                                    style="object-fit:cover;">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $company->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" readonly value="{{ $company->email }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>

                            <div class="col-md-6">
                                <input id="logo" type="file" class="form-control" name="logo" autocomplete="logo">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address"
                                class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <textarea id="address" class="form-control" name="address"
                                    autocomplete="address">{{ $company->address }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <select name="status" id="status">
                                    <?php
                                    $status="active";
                                    $status2 = "inactive";
                                    $value=-1;
                                   if($user->status != 1){
                                        $status="inactive";
                                        $value=1;
                                        $status2="active";
                                 }?>
                                    <option value="{{$user->status}}">{{$status}}</option>

                                    <option value="{{$value}}">{{$status2}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection