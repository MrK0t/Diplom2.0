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
                            <h3 id = "w_b" class="text-center" style="margin:auto; color:white">Профиль пользователя</h3>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="bi bi-tools"></span>
                            </button>
                            
                            <div class="collapse navbar-collapse my-3" id="navbarSupportedContent">
                                <form class="d-flex my-1" method="POST" action="{{ route('register') }}">
                                    <input id="name" type="text" class="form-control my-1 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Имя пользователя">
                                    <button class="btn btn-primary mx-2" type="submit">Изменить</button>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </form>
                                <form class="d-flex my-1" method="POST" action="{{ route('register') }}">
                                    <input id="firstName" type="text" class="form-control my-1 @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" placeholder="Имя">
                                    <button class="btn btn-primary mx-2" type="submit">Изменить</button>
                                    @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </form>
                                <form class="d-flex my-1" method="POST" action="{{ route('register') }}">
                                    <input id="lastName" type="text" class="form-control my-1 @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" placeholder="Фамилия">
                                    <button class="btn btn-primary mx-2" type="submit">Изменить</button>
                                    @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </form>
                                <form class="d-flex my-1" method="POST" action="{{ route('register') }}">
                                    <input id="patronimic" type="text" class="form-control my-1 @error('patronimic') is-invalid @enderror" name="patronimic" value="{{ old('patronimic') }}" required autocomplete="patronimic" placeholder="Отчество">
                                    <button class="btn btn-primary mx-2" type="submit">Изменить</button>
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
                                                <input id="email-confirm" type="email" class="form-control my-1" name="email_confirmation" required autocomplete="new-email" placeholder="Подтвердите email">
                                            </div>
                                            <div class="col-md-2 col-sm-12 my-1">
                                                <button class="btn btn-primary" type="submit">Изменить</button>
                                            </div>
                                        </div>
                                    </form> 

                                    <form class="d-flex my-1" method="POST" action="{{ route('register') }}">
                                        <div class="row justify-content-center">
                                            <div class="col-md-5 col-sm-12">
                                                <input id="password" type="text" class="form-control my-1 @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" placeholder="Пароль">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-5 col-sm-12">
                                                <input id="password-confirm" type="password" class="form-control my-1" name="password-confirm" required autocomplete="new-password" placeholder="Подтвердите пароль">
                                            </div>
                                            <div class="col-md-2 col-sm-12 my-1">
                                                <button class="btn btn-primary" type="submit">Изменить</button>
                                            </div>
                                        </div>
                                    </form> 
                            </div>   
                        </div>   
                    </nav>
                    <!-- SEACH block -->
                    <div class="seach_block">
                        <p id = "w_b" class="text-center" style="margin:auto">Отслеживайте свои забронированные номера</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 text-md-end text-center ">
                            
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Сортировать по цене</label>
                        </div>
                        <div class="col-md-6 col-sm-12 text-md-start text-center">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Сортировать по имени</label>
                        </div>
                    </div>
                </div>
                
                <!-- filter form -->
                <div class="row gy-2">
                    <div class="col-md-6 col-sm-12 text-md-end ">
                        <input class = "form-control" placeholder="Максимальная цена">
                        <label>Дата прибытия</label>
                        <input id="sdate" type="date" placeholder="Arrivel date"class="form-control @error('sdate') is-invalid @enderror" name="sdate" required autocomplete="sdate" v-model="sdate"t>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <input class = "form-control" placeholder="Минимальная цена">
                        <label>Дата выселения</label>
                    <input id="sdate" type="date" placeholder="End date"class="form-control @error('fdate') is-invalid @enderror" name="fdate" required autocomplete="fdate" v-model="fdate"t>
                    </div>
                    <div class="row mx-1 py-3" style="padding:8 12; padding-right: 20px;">
                        <button type="button" class="btn btn-warning" >Применить фильтр</button>
                    </div>
                    
                </div>
            </div>
            </div>
        </div>
<hr>    


<!-- Orders -->

<div id="body_main" class = "body_main row gx-5 gy-5">
        @foreach ($order_data as $order)

            @if($order->userId == Auth::user()->id)
                @foreach($room_data as $room)
                        
                    @if ($order->roomId == $room->id)
                        <div id="obj"class = "obj col-md-6">
                            <div class = "shadow">
                                <h2 id ="w">{{$room->roomType->name}}</h2>
                            </div>
                        <div class="card">
                            <div class="card-img">
                            <img class="" src="{{$room->image}}">
                            </div>
                            <div class="card-body">
                            <h5 class="card-title">Описание:</h5>
                            <p class="card-text">{{$room->description}}</p>
                            </div>

                            <ul class="list-group list-group-flush">
                            <li class="list-group-item">Категории: 
                                @php $cat_out=[]; @endphp
                                
                                @foreach ($cur_category_data as $cur_category)
                                    @if ($cur_category->roomsId == $room->id)
                                        @foreach ($category_data as $category)
                                            @if ($category->id == $cur_category->roomCategoryId)

                                                @php 
                                                    array_push($cat_out, $category->name);
                                                @endphp

                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach

                                {{implode (', ', $cat_out)}}
                            </li>
                            <li class="list-group-item">Корпус: {{$room->building->name}}</li>
                            <li class="list-group-item">Номер комнаты: {{$room->roomNumber}}</li>
                            <li class="list-group-item">Дата прибытия: {{$order->sDate}}</li>
                            <li class="list-group-item">Дата выселения: {{$order->fDate}}</li>
                            <li class="list-group-item">Цена за сутки: {{$room->price}}</li>
                            
                            </ul>
                            
                            <form method="POST" action="{{ route('orders.destroy', $order->id)}}">
                                @csrf
                                @method('DELETE')
                                <div class="card-body">
                                    <div class="row" style="padding:8 12;">
                                        <button type="button" class="btn btn-outline-primary" onclick="location.href='{{ route('index.show', $room->id)}}'">Перейти к номеру</button>
                                    </div>
                                    <div class="row" style="padding:8 12;">
                                        <button type="delete" class="btn btn-danger my-3">Отменить резерв</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                    @endif

                @endforeach
            @endif

        @endforeach
        </div>


      
</div>

@endsection
