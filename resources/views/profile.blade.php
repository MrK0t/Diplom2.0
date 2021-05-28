@extends('layouts.app')
@section('title')
profile
@endsection

@section('content')

<h1>Add task</h1> 
<hr>    
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="card col-xl-6 col-md-12  p-3">

            <form method="POST" action="{{ route('tasks.store')}}" enctype="multipart/form-data" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <select required name="category_id" id="category-select" class="input-group-text @error('category_id') is-invalid @enderror text-start col-12">
                            <option value="" disabled selected hidden>Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category -> id }}"> {{ $category -> name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-start">{{ __('Task name') }}</label>

                        <div class="col-xl-8 col-md-12">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <label for="text" class="col-md-4 col-form-label text-start">{{ __('text') }}</label>

                        <div class="col-xl-8 col-md-12">
                            <input id="text" type="text" class="form-control @error('text') is-invalid @enderror" name="text" value="{{ old('fio') }}" required autocomplete="fio" autofocus>

                            @error('text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label text-start">{{ __('Add your image') }}</label>

                        <div class="col-xl-8 col-md-12">
                            <input id="image" class="btn-dark @error('image') is-invalid @enderror" name="image" type="file"  accept ='image/jpeg,image/jpg,image/png,image/bmp'  value="{{ old('fio') }}" required autocomplete="fio" autofocus>

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg col-12 mt-2">Add</button>
            </form>
        </div>
    </div>
</div>

<h1>My tasks</h1> 
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
                <p class="card-text text-end">user {{$task->user->name}}</p>

                @if($task -> status == 0)
                <form method="POST" id="alert-{{$task->id}}" action="{{route('tasks.destroy', $task)}}"class="row">
                    @csrf
                    @method('delete')
                        <button type="button" onclick="if(confirm('Accept your action to cancel task')){event.preventDefault(); document.getElementById('alert-{{$task->id}}').submit();} " class="btn btn-primary btn-lg col-12 mt-2">Cancel</button>
                </form>
                @elseif($task -> status == 1)
                <h2>Done</h2>
                @elseif($task -> status == 2)
                <h2>Canceled</h2>
                @endif
            </div>  
        </div>
    </div>   
    @endforeach
</div>

@endsection
