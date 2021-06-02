@extends('adminka')

@section('name')
Типы номеров
@endsection

@section('data')

<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header"><h5 class="text-center">Добавление нового типа</h3></div>


                <div class="card-body">
                    <form method="POST" action="{{ route('types.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Название') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="current-name">

                                @error('name')
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
                                    {{ __('Добавить') }}
                                </button>
                            </div>
                            </div>
                        </div>
                    </form>
                    
                    <!-- ITEMS LIST -->
                    <hr>
                    <div id="body_main" class = "body_main row gx-5 gy-5">
                        <div class="row">
                            @foreach($type_data as $type)
                            <div class="col-xl-6 col-md-12 my-5">
                                <div class="card">

                                    <div class="card-header"><h6 class="text-center">Название: {{$type->name}}</h6></div>


                                    <div class="card-body">
                                    <div class="col text-center">
                                            <button type="submit" class="btn btn-outline-primary " onclick="location.href='{{ route('types.edit', $type->id)}}'">
                                                {{ __('Изменить') }}
                                            </button>
                                            <button type="submit" class="btn btn-danger my-2">
                                            <div class="mx-2">
                                                {{ __('Удалить') }}
                                            </div>
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
