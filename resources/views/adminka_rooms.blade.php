@extends('adminka')


@section('data')

<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">{{ __('Rooms') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#idcollapse" class="btn btn-light hov">Categories</button>
                            <div class="row m-0 px-0 py-2 bg-light rounded-1 collapse" id="idcollapse">
                                @foreach ($category_data as $category)
                                    <label for="category{{$category->id}}">
                                        <input type="checkbox" class="me-2" id="category{{$category->id}}" name="checkbox[]" value='{{$category->id}}'>{{$category->name}}
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Types</option>
                                        @foreach ($type_data as $type)
                                            <option value='{{$type->id}}'>{{$type->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="roomNumber" class="col-md-4 col-form-label text-md-right">{{ __('RoomNumber') }}</label>

                            <div class="col-md-6">
                                <input id="roomNumber" type="roomNumber" class="form-control @error('roomNumber') is-invalid @enderror" name="roomNumber" value="{{ old('roomNumber') }}" required autocomplete="roomNumber" autofocus>

                                @error('roomNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="text" class="form-control @error('image') is-invalid @enderror" name="image" required autocomplete="current-image">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="current-description">

                                @error('description')
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

                                    <img src="{{$room_data[0]['image']}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                    <div class="row">
                                        <p class="card-text col-4 text-start">{{$room->roomNumber}}</p>
                                        <h5 class="card-title col-4 text-center">{{$room->price}}</h5>
                                        </div>
                                        <div class="row">
                                            <p class="card-text col-12 text-center">category</p>
                                        </div>
                                        <hr>
                                        <p class="card-text text-start">data</p>
                                        <p class="card-text text-end">data</p>
                                        <p class="card-text text-end">data</p>
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