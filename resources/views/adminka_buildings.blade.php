@extends('adminka')


@section('data')

<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">{{ __('Categories') }}</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('BuildingName') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="current-name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <input id="address" type="address" class="form-control @error('type') is-invalid @enderror" name="type" required autocomplete="current-type">
                                @error('type')
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
                            @foreach($building_data as $building)
                            <div class="col-xl-6 col-md-12 my-5">
                                <div class="card">

                                    <div class="card-body">
                                    <div class="row">
                                        <p class="card-text col-12 text-center">{{$building->name}}</p>
                                        <p class="card-text col-12 text-center">{{$building->address}}</p>
                                    </div>
                                    <hr>
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
