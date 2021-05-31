@extends('layouts.header')
@section('title')
profile
@endsection

@section('content')

<div class = "seach_user">
            
            <div class ="seach_second">
            <div class="seach_border text-light">
                <div class="seach_block">
                    
                    <!-- NAVBAR -->
                    <nav class="navbar  navbar-light ">
                        <div class="container-fluid">
                            <h3 id = "w_b" class="text-center" style="margin:auto; color:white">USER PROFILE</h3>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="bi bi-tools"></span>
                            </button>
                            
                            <div class="collapse navbar-collapse my-3" id="navbarSupportedContent">
                                <form class="d-flex my-1" method="POST" action="{{ route('register') }}">
                                    <input id="name" type="text" class="form-control my-1 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name">
                                    <button class="btn btn-primary mx-2" type="submit">Edit</button>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </form>
                                <form class="d-flex my-1" method="POST" action="{{ route('register') }}">
                                    <input id="firstName" type="text" class="form-control my-1 @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" placeholder="FirstName">
                                    <button class="btn btn-primary mx-2" type="submit">Edit</button>
                                    @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </form>
                                <form class="d-flex my-1" method="POST" action="{{ route('register') }}">
                                    <input id="lastName" type="text" class="form-control my-1 @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" placeholder="LastName">
                                    <button class="btn btn-primary mx-2" type="submit">Edit</button>
                                    @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </form>
                                <form class="d-flex my-1" method="POST" action="{{ route('register') }}">
                                    <input id="patronimic" type="text" class="form-control my-1 @error('patronimic') is-invalid @enderror" name="patronimic" value="{{ old('patronimic') }}" required autocomplete="patronimic" placeholder="Patronimic">
                                    <button class="btn btn-primary mx-2" type="submit">Edit</button>
                                    @error('patronimic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </form>

                                <!-- edition email&pass -->
                                    <form class="d-flex my-1" method="POST" action="{{ route('register') }}">
                                        <div class="row justify-content-center">
                                            <div class="col-md-5 col-sm-12">
                                                <input id="email" type="email" class="form-control my-1 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-5 col-sm-12">
                                                <input id="email-confirm" type="email" class="form-control my-1" name="email_confirmation" required autocomplete="new-email" placeholder="Confirm email">
                                            </div>
                                            <div class="col-md-2 col-sm-12 my-1">
                                                <button class="btn btn-primary" type="submit">Edit</button>
                                            </div>
                                        </div>
                                    </form> 

                                    <form class="d-flex my-1" method="POST" action="{{ route('register') }}">
                                        <div class="row justify-content-center">
                                            <div class="col-md-5 col-sm-12">
                                                <input id="password" type="text" class="form-control my-1 @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" placeholder="Password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-5 col-sm-12">
                                                <input id="password-confirm" type="password" class="form-control my-1" name="password-confirm" required autocomplete="new-password" placeholder="Confirm password">
                                            </div>
                                            <div class="col-md-2 col-sm-12 my-1">
                                                <button class="btn btn-primary" type="submit">Edit</button>
                                            </div>
                                        </div>
                                    </form> 
                            </div>   
                        </div>   
                    </nav>
                    <!-- SEACH block -->
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


<!-- Orders -->
<h3 class="text-center">User orders</h3> 
<hr>  

<div id="body_main" class = "body_main row gx-5 gy-5">
<div class="row">
    @foreach($order_data as $order)
    <div class="col-xl-6 col-md-12 my-5">
        <div class="card">

            <img src="rooms_img/testRoom.jpg" class="card-img-top" alt="...">
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
</div>

@endsection
