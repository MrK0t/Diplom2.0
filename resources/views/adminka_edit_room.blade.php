@extends('adminka')

@section('name')
Редактирование номера
@endsection

@section('data')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5 class="text-center">Редактирование Номера: {{$room_data[0]['roomNumber']}}, корпуса {{$room_data[0]->building->name}}</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{route('rooms.update', $room_data[0]['id'])}}">
                            @csrf
                            <div class="form-group row">
                            <button type="button" data-bs-toggle="collapse" data-bs-target="#idcollapse" class="btn btn-light hov">Категории
                            </button>
                                <div class="row m-0 px-0 py-2 bg-light rounded-1 collapse" id="idcollapse">
                                @foreach ($category_data as $category)
                                    <label for="category{{$category->id}}">
                                        <input type="checkbox" class="me-2" id="category{{$category->id}}" name="categoryId[]" value='{{$category->id}}'
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
                                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Тип') }}</label>
                                <div class="col-md-6">
                                    <select class="form-select" aria-label="Default select example" name="roomTypeId">
                                        @foreach ($type_data as $type)
                                            @if($type->id == $room_data[0]['roomTypeId'])
                                                <option value='{{$type->id}}' selected>{{$type->name}}</option>
                                            @else
                                                <option value='{{$type->id}}'>{{$type->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Номер корпуса') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" aria-label="Default select example" name="buildingId">
                                        @foreach ($building_data as $building)
                                            @if($building->id == $room_data[0]['buildingId'])
                                                <option value='{{$building->id}}' selected>{{$building->name}}</option>
                                            @else
                                            <option value='{{$building->id}}'>{{$building->name}}</option>
                                            @endif
                                        @endforeach
                                </select>
                            </div>
                            </div>

                            <div class="form-group row">
                                <label for="roomNumber" class="col-md-4 col-form-label text-md-right">{{ __('Номер комнаты') }}</label>

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
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Изображение(URL)') }}</label>

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
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Описание') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="current-description" value="{{$room_data[0]['description']}}">

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Цена за сутки') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" required autocomplete="current-price" value="{{$room_data[0]['price']}}">

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    <!-- BUTTONS -->    
                        <div class="container">
                            <div class="row">
                                <div class="col text-center">
                                        @method('PATCH')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary " >
                                            {{ __('Изменить') }}
                                        </button>
                                    </form>
                                   
                                    <form method="POST" action="{{ route('login') }}">
                                    <button type="submit" class="btn btn-danger my-2">
                                        <div class="mx-2">
                                            {{ __('Удалить') }}
                                        </div>
                                    </button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
