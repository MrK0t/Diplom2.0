@extends('layouts.header')
@section('title')
profile
@endsection

@section('content')

<div class = "seach_main">
            
            <div class ="seach_second">
            <div class="seach_border text-light">
                <div class="seach_block">
                    <h3 id = "w_b" class="text-center" style="margin:auto; color:white">USER PROFILE</h3>

                    <div class="seach_block">
                    <p id = "w_b" class="text-center" style="margin:auto">Find the best room on SiteName</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 text-md-end text-center ">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Sort by price</label>
                        </div>
                        <div class="col-md-6 col-sm-12 text-md-start text-center">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Sort by name</label>
                        </div>
                    </div>
                </div>

                <!-- SLIDER -->
                <div class="multi-range-slider">
                    <div class="row">
                        <input type="range" id="input-left" min="0" max="100" value="25">
                    </div>
                    <div class="row">
                        <input type="range" id="input-right" min="0" max="100" value="75">
                    </div>

                    <div class="slider">
                        <div class="track"></div>
                        <div id="range"class="range"></div>
                        <div class="thumb left"></div>
                        <div class="thumb right"></div>
                    </div>
                </div>
                
                <!-- filter form -->
                <div class="row gy-2">
                    <div class="col-md-6 col-sm-12 text-md-end ">
                        <input class = "form-control" placeholder="Min price">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <input class = "form-control" placeholder="Max price">
                    </div>
                    <div class="row mx-1 py-3" style="padding:8 12; padding-right: 20px;">
                        <button type="button" class="btn btn-warning" >Apply filter</button>
                    </div>
                    
                </div>
            </div>
            </div>
        </div>
<hr>    
<div class="container mb-5">
    <div class="row justify-content-center my-3">
    <div class="col-md-8">
        <div class="card">
        <div class="card-header ">{{ __('Personal Data') }}
        </div>
        <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-3 my-1 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6 my-1">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3 my-1">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="firstName" class="col-md-3 my-1 col-form-label text-md-right">{{ __('FirstName') }}</label>
                            <div class="col-md-6 my-1">
                                <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>
                                @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3 my-1">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="lastName" class="col-md-3 my-1 col-form-label text-md-right">{{ __('LastName') }}</label>
                            <div class="col-md-6 my-1">
                                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>
                                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3 my-1">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="patronimic" class="col-md-3 my-1 col-form-label text-md-right">{{ __('Patronimic') }}</label>
                            <div class="col-md-6 my-1">
                                <input id="patronimic" type="text" class="form-control @error('patronimic') is-invalid @enderror" name="patronimic" value="{{ old('patronimic') }}" required autocomplete="patronimic" autofocus>
                                @error('patronimic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3 my-1">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
        </div>
        </div>
    </div>
    </div>

    <div class="row justify-content-center my-3">
    <div class="col-md-8">
        <div class="card">
        <div class="card-header ">{{ __('Security data') }}
        </div>
        <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-3 my-1 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                            <div class="col-md-8 my-1">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>
                        

                        <div class="form-group row">
                            <label for="email-confirm" class="col-md-3 my-1 col-form-label text-md-right">{{ __('Confirm Email') }}</label>

                            <div class="col-md-8">
                                <input id="email-confirm" type="email" class="form-control" name="email_confirmation" required autocomplete="new-email">
                            </div>
                            <div class="col-md-3 my-1">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>
                    
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="password" class="col-md-3 my-1 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-8 my-1">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 my-1 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="">
                            <div class="col-12 my-1">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
        </div>
        </div>
    </div>
    </div>
</div>

<h1>User orders</h1> 
<hr>  

<div class="row">
    @foreach($order_data as $order)
    <div class="col-xl-6 col-md-12 my-5">
        <div class="card">

            <img src="" class="card-img-top" alt="...">
            <div class="card-body">
            <div class="row">
                <p class="card-text col-4 text-start">{{$order->created_at}}</p>
                <h5 class="card-title col-4 text-center">{{$order->user->name}}</h5>
                </div>
                <div class="row">
                    <p class="card-text col-12 text-center">category</p>
                </div>
                <hr>
                <p class="card-text text-start">data</p>
                <p class="card-text text-end">data</p>
                <p class="card-text text-end">data</p>
            </div>  
        </div>
    </div>   
    @endforeach
</div>

@endsection
