@extends('adminka')


@section('data')
<h3 class="text-center">ADMINKA</h3>
<hr>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">{{ __('Rooms') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('RoomNumber') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="container">
                            <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add new') }}
                                </button>
                            </div>
                            </div>
                        </div>
                    </form>
                    
                    <!-- ITEMS LIST -->
                    <hr>
                    <div id="body_main" class = "body_main row gx-5 gy-5">
                        <div class="row">
                            @foreach($room_data as $room)
                            <div class="col-xl-6 col-md-12 my-5">
                                <div class="card">

                                    <img src="rooms_img/testRoom.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                    <div class="row">
                                        <p class="card-text col-4 text-start">{{$room->Number}}</p>
                                        <h5 class="card-title col-4 text-center">{{$room->Price}}</h5>
                                        </div>
                                        <div class="row">
                                            <p class="card-text col-12 text-center">category</p>
                                        </div>
                                        <hr>
                                        <p class="card-text text-start">data</p>
                                        <p class="card-text text-end">data</p>
                                        <p class="card-text text-end">data</p>
                                        <div class="col text-center">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Edit') }}
                                            </button>
                                            <button type="submit" class="btn btn-outline-danger">
                                                {{ __('Delete') }}
                                            </button>
                                        </div>
                                    </div>  
                                </div>
                            </div>   
                            @endforeach
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection