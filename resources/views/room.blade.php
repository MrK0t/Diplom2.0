@extends('layouts.header')
@section('title')
room
@endsection

@section('content')

<div class = "seach_cart">
            
        <div class ="seach_second">
        <div class="seach_border text-light">
            <div class="seach_block">
                <h3 id = "w_b" class="text-center" style="margin:auto; color:white">Номер</h3>

                <div class="seach_block">
                <p id = "w_b" class="text-center" style="margin:auto">Бронируете номера в лучшей гостинице</p>
                </div>
                
            </div>

            <!-- filter form -->
            <div class="row gy-2">
                <div class="col-md-6 col-sm-12 text-md-right ">
                    <label>Дата прибытия</label>
                    <input id="sdate" type="date" placeholder="Arrivel date"class="form-control @error('sdate') is-invalid @enderror" name="sdate" required autocomplete="sdate" v-model="sdate"t>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <label>Дата выселения</label>
                    <input id="sdate" type="date" placeholder="End date"class="form-control @error('fdate') is-invalid @enderror" name="fdate" required autocomplete="fdate" v-model="fdate"t>
                </div>

                <form method="POST" action="" class="row mx-1 py-3" style="padding:8 12; padding-right: 20px;">
                    <button type="button" class="btn btn-warning">Забронировать номер</button>
                </form>
            </div>
        </div>
        </div>
</div>
        
<hr><!------------------------------------------------------------------>

<div id="body_main" class = "body_main row gx-5 gy-5">
<div class="container" style="margin-bottom: 10%;">
    <div class="row">
        <!-- left side -->
        <div class="col-md-5" style="margin-bottom: 5%;">
            <div class="card">
                <div class="row">
                    <h4 class="text-center">Описание</h4>
                    <div class="px-3">
                        <hr>
                    </div>
                    <p  class="px-4">{{$room_data[0]['description']}}</p>
                </div>
                <ul class="list-group list-group-flush">
                    
                    <li class="list-group-item">Тип комнаты: {{$room_data[0]->roomType->name}}</li>
                    <li class="list-group-item">Категории: 
                    @php $cat_out=[] @endphp

                    @foreach ($buffer as $b)
                        @php 
                        array_push($cat_out, $b);
                        @endphp
                    @endforeach

                    {{implode (', ', $cat_out)}}
                    </li>
                </ul>
            </div>

            <form method="" action="" class="row mx-1 py-3" ">
                    <button type="button" class="btn btn-primary" onclick="location.href='{{ route('index')}}'">Назад</button>
                </form>

        </div>
            
        <!-- right side -->
        <div class="col-md-7">
            <div class="card">
                
            <img src="{{$room_data[0]['image']}}" class="img-fluid" alt="..." style="border-radius: 4px;">
            <ul class="list-group list-group-flush">
                    
                <li class="list-group-item">Адрес: {{$room_data[0]->building->address}}</li>
                <li class="list-group-item">Корпус: {{$room_data[0]->building->name}}</li>
                <li class="list-group-item">Цена за сутки: {{$room_data[0]['price']}}</li>
            </ul>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

