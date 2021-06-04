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
                </div>
                <hr>
                
                <!-- filter form -->
                <form method="GET" action="{{route('index')}}">
                    @csrf
                    <div class="row gy-3">
                        <div class="col-md-6 col-sm-12 text-md-end">
                            <!-- <label>Макимальная цена</label> -->
                            <input id="minPrice" name="minPrice" type="integer" class = "form-control"  placeholder="Минимальная цена" class="form-control @error('minPrice') is-invalid @enderror">
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- <label>Минимальная цена</label> -->
                            <input id="maxPrice" name="maxPrice" type="integer" class = "form-control" placeholder="Максимальная цена" class="form-control @error('maxPrice') is-invalid @enderror">
                        </div>
                        <div class="col-md-6 col-sm-12 text-md-right ">
                            <label>Дата прибытия</label>
                            <input id="sDate" type="date" placeholder="Arrivel date" class="form-control @error('sDate') is-invalid @enderror" name="sDate" autocomplete="sDate">
                        </div>
                        <div class="col-md-6 col-sm-12 ">
                            <label>Дата выселения</label>
                            <input id="fDate" type="date" placeholder="End date"class="form-control @error('fDate') is-invalid @enderror" name="fDate" autocomplete="fDate">
                        </div>
                        <div class="row mx-1 py-3" style="padding:8 12; padding-right: 20px;">
                            <button type="submit" class="btn btn-warning" >Применить фильтры</button>
                        </div>
                    </div>
                </form>
                @if($errors->any())
                <!-- Modal -->
                    <div class="modal fade" id="errors" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-muted" id="exampleModalLabel">Ошибки при вводе данных</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @foreach ($errors->all() as $e)
                                    <p>{{$e}}</p>
                                    <br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    </div>

                <script> 
                    var myModal = new bootstrap.Modal(document.getElementById('errors')) 
                    myModal.show();
                </script>
                @endif
            </div>
            </div>
        </div>
        
    <hr><!------------------------------------------------------------------>
        
        <div id="body_main" class = "body_main row gx-5 gy-5">
            @foreach($room_data as $room)
            <div id="obj"class = "obj col-md-6">
                <div class = "shadow">
                    <h2 id ="w">Номер: {{$room->roomNumber}} - {{$room->roomType->name}}</h2>
                </div>
            <div class="card">
                <!-- <div class="card-img"> -->
                <img class="" src="{{$room->image}}" style="max-height: 400px;">
                <!-- </div> -->
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

