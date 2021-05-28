@extends('layouts.app')


@section('title')
request
@endsection

@section('content')

<h1>Edit categories</h1> 
<hr>    
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="card col-xl-6 col-md-12  p-3">

            <form method="POST" action="{{ route('categories.destroy') }}">
                @csrf
                <div class="card-body">
                    <div class="row ">
                        <select required name="id" id="category-select" class=" input-group-text @error('id') is-invalid @enderror text-start col-12">
                            <option value="" disabled selected hidden>Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category -> id }}"> {{ $category -> name }}</option>
                            @endforeach
                        </select>
                        @error('id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 ">
                    <button type="submit" class="btn btn-primary col-12 mt-2">Remove</button>
                </div>
            </form>

            <form method="POST" action="{{ route('categories.store') }}">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <label for="name" class="col-12 col-form-label text-start">{{ __('Category name') }}</label>
                    </div>
                    <div class="row">

                        <div class="col-12 px-0">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12 ">
                    <button type="submit" class="btn btn-primary col-12 mt-2">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<h1>Complete or cancle incoming tasks</h1> 
<hr>

<div class="row">
    @foreach($tasks_data as $task)
    <div class="col-xl-6 col-md-12 my-5">
        <div class="card">

            <img src="{{$task->image}}" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="row">
                    <p class="card-text col-4 text-start">{{$task->created_at}}</p>
                    <h5 class="card-title col-4 text-center">{{$task->name}}</h5>
                </div>
                <div class="row">
                    <p class="card-text col-12 text-center">category {{$task->category->name}}</p>
                </div>
                <hr>
                <p class="card-text text-start">{{$task->text}}</p>
                <p class="card-text text-end">user {{$task->user->name}}</p>

                <div class="row">
                    <form method="POST" action="{{ route('tasks.update', $task) }}" class="col-xl-6 col-md-12 ">
                    @csrf
                    @method('patch')
                        <input type="hidden" name = "status" value="1">
                        <button type="submit" class="btn btn-primary col-12 mt-2">Done</button>
                    </form>
                    
                    <form method="POST" action="{{ route('tasks.update', $task) }}" class="col-xl-6 col-md-12 ">
                    @csrf
                    @method('patch')
                        <input type="hidden" name = "status" value="2">
                        <button type="submit" class="btn btn-primary col-12 mt-2">Cancle</button>
                    </form>
                </div>
            </div>  
        </div>
    </div>   
    @endforeach
</div>

@endsection
