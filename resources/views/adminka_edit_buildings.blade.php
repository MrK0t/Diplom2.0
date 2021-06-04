@extends('adminka')

@section('name')
Редактирование корпуса
@endsection

@section('data')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5 class="text-center">Редактирование корпуса: {{$building_data[0]['name']}}</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('buildings.update', $building_data[0]['id']) }}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group row">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Номер корпуса') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="current-name" value="{{$building_data[0]['name']}}">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Адрес') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="current-address" value="{{$building_data[0]['address']}}">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-outline-primary " >
                                        {{ __('Изменить') }}
                                    </button>
                        </form>

                        
                                            <form method="post" action="{{route('buildings.destroy', $building_data[0]['id'])}}">
                                                @method('delete')
                                                @csrf
                                                <button type="delete" class="btn btn-danger my-2">
                                                <div class="mx-2">
                                                    {{ __('Удалить') }}
                                                </div>
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
