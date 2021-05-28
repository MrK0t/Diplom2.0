@extends('layouts.header')
<!-- coom -->
@section('title')
home
@endsection

@section('content')
<h1>HOME</h1> 
<hr>
<div class="row">
    @foreach($room_data as $room)
    <div class="col-xl-6 col-md-12 my-5">
        <div class="card">

            <img src="{{$room->image}}" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="row">
                    <p class="card-text col-4 text-start">{{$room->created_at}}</p>
                    <h5 class="card-title col-4 text-center">{{$room->name}}</h5>
                </div>
                <div class="row">
                    <p class="card-text col-12 text-center">category {{$room->room_categries->name}}</p>
                </div>
            </div>  
        </div>
    </div>   
    @endforeach
</div>
@endsection

