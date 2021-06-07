@extends('adminka')

@section('name')
Бронирования
@endsection

@section('data')

<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                    <div id="body_main" class = "body_main row gx-5 gy-5">
                        <div class="row">
                        @foreach ($order_data as $order)
                            @foreach($room_data as $room)
                            @if ($order->roomId == $room->id)
                            <div class="col-xl-6 col-md-12 my-5">
                                <div class="card">

                                    <img src="{{$room['image']}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                    <div class="row">
                                        <h6 class="card-title col-12 text-center">Тип: {{$room->roomType->name}}</h6>
                                        </div>
                                        <hr>
                                        <div class="row">
                                        <p class="col-6 card-text text-start">Номер комнаты: {{$room->roomNumber}}</p>
                                        <p class="col-6 card-text text-end">Номер корпуса: {{$room->building->name}}</p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Имя пользователя: {{$order->user->name}}</li>
                                    <li class="list-group-item">Дата прибытия: {{$order->sDate}}</li>
                                    <li class="list-group-item">Дата выселения: {{$order->fDate}}</li>
                                    <li class="list-group-item">Цена за сутки: {{$room->price}}</li>
                                    
                                    </ul>
                                    </div>  
                                </div>
                            </div>   
                            @endif
                        @endforeach
                        @endforeach
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
