
@extends('layouts.header')

@section('title')
adminka
@endsection

@section('content')
<div>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-md navbar-light bg-secondary">
        <div class="container-fluid">
            <h3 id = "w_b" class="text-center mx-3" style="margin:auto; color:white">ADMINKA</h3>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="bi bi-tools"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <button class="btn btn-light mx-3" onclick="location.href='{{ route('rooms.index')}}'">Rooms</button>
                <button class="btn btn-light mx-3" onclick="location.href='{{ route('categories.index')}}'">Categories</button>
                <button class="btn btn-light mx-3" onclick="location.href='{{ route('types.index')}}'">Types</button>
                <button class="btn btn-light mx-3" onclick="location.href='{{ route('buildings.index')}}'">Buildings</button>
            </div>   
        </div>   
    </nav>
@yield('data')
</div>
@endsection