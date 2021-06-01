@extends('adminka')


@section('data')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit room: {{$room_data[0]['roomNumber']}} </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                            <button type="button" data-bs-toggle="collapse" data-bs-target="#idcollapse" class="btn btn-light hov">Categories</button>
                                <div class="row m-0 px-0 py-2 bg-light rounded-1 collapse" id="idcollapse">
                                @foreach ($category_data as $category)
                                    <label for="category{{$category->id}}">
                                        <input type="checkbox" class="me-2" id="category{{$category->id}}" name="checkbox[]" value='{{$category->id}}'
                                            @foreach ($cur_category_data as $cur_category)
                                                @if($cur_category->roomCategoryId == $category->id)
                                                    checked
                                                @endif
                                            @endforeach
                                        >{{$category->name}}
                                    </label>
                                @endforeach
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                                <div class="col-md-6">
                                    <select class="form-select" aria-label="Default select example">
                                        @foreach ($type_data as $type)
                                            @if($type->id == $room_data[0]['roomTypeId'])
                                                <option selected>{{$type->name}}</option>
                                            @endif
                                                <option value='{{$type->id}}'>{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="roomNumber" class="col-md-4 col-form-label text-md-right">{{ __('RoomNumber') }}</label>

                                <div class="col-md-6">
                                    <input id="roomNumber" type="roomNumber" class="form-control @error('roomNumber') is-invalid @enderror" name="roomNumber" required autocomplete="roomNumber" autofocus value="{{$room_data[0]['roomNumber']}}">

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
                                    <input id="image" type="text" class="form-control @error('image') is-invalid @enderror" name="image" required autocomplete="current-image" value="{{$room_data[0]['image']}}">

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
                                    <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="current-description" value="{{$room_data[0]['description']}}">

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
                                        {{ __('Edit') }}
                                    </button>
                                </div>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
