@extends('layouts.header')
@section('title')
home
@endsection

@section('content')
    <div>
        <div class = "seach_main">
            
            <div class ="seach_second">
            <div class="seach_border text-light">
                <div class="seach_block">
                    <h3 id = "w_b" class="text-center" style="margin:auto; color:white">Главная</h3>

                    <div class="seach_block">
                    <p id = "w_b" class="text-center" style="margin:auto">Бронируете номера в лучшей гостинице</p>
                    </div>
                    <div class="row ">
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
                <div class="row gy-3">
                    <div class="col-md-6 col-sm-12 text-md-end">
                        <input class = "form-control" placeholder="Минимальная цена">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <input class = "form-control" placeholder="Максимальная цена">
                    </div>
                    <div class="row mx-1 py-3" style="padding:8 12; padding-right: 20px;">
                        <button type="button" class="btn btn-warning" >Применить фильтры</button>
                    </div>
                    
                </div>
            </div>
            </div>
        </div>
        
    <hr><!------------------------------------------------------------------>
        
        <div id="body_main" class = "body_main row gx-5 gy-5">
            @foreach($room_data as $room)
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
                    @php $cat_out=[] @endphp

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
                <li class="list-group-item">Адрес корпуса: {{$room->building->address}}</li>
                <li class="list-group-item">Цена за сутки: {{$room->price}}</li>
                
                </ul>
                

                <div class="card-body">
                    <div class="row" style="padding:8 12;">
                        <button type="button" class="btn btn-outline-primary" onclick="location.href='{{ route('index.show', $room->id)}}'">Перейти к номеру</button>
                    </div>
                </div>
            </div>
            </div>
            @endforeach
        </div>
        
    </div>
@endsection

