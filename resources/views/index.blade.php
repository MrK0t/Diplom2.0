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
                    <h3 id = "w_b" class="text-center" style="margin:auto; color:white">HOME</h3>

                    <div class="seach_block">
                    <p id = "w_b" class="text-center" style="margin:auto">Find the best room on SiteName</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 text-md-end text-center ">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Sort by price</label>
                        </div>
                        <div class="col-md-6 col-sm-12 text-md-start text-center">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Sort by name</label>
                        </div>
                    </div>
                </div>
                
                <!-- filter form -->
                <div class="row gy-2">
                    <div class="col-md-6 col-sm-12 text-md-end ">
                        <input class = "form-control" placeholder="Min price">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <input class = "form-control" placeholder="Max price">
                    </div>
                    <div class="row mx-1 py-3" style="padding:8 12; padding-right: 20px;">
                        <button type="button" class="btn btn-warning" >Apply filter</button>
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
                    <h2 id ="w">{{$room->roomNumber}}</h2>
                </div>
            <div class="card">
                <div class="card-img">
                <img class="" src="rooms_img/testRoom.jpg">
                </div>
                <div class="card-body">
                <h5 class="card-title">{{$room->roomType->name}}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>

                <ul class="list-group list-group-flush">
                <li class="list-group-item">Building: {{$room->building->name}}</li>
                <li class="list-group-item">Address: {{$room->building->address}}</li>
                <li class="list-group-item">Total price: {{$room->price}}</li>
                
                </ul>
                

                <div class="card-body">
                    <div class="row" style="padding:8 12;">
                        <button type="button" class="btn btn-outline-primary" >Go to</button>
                    </div>
                </div>
            </div>
            </div>
            @endforeach
        </div>
        
    </div>
@endsection

