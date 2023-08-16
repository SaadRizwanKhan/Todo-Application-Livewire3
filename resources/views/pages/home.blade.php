@extends('layouts.mainLayout')

@section('content')

@error('title')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@enderror

<h1 class="text-center mt-5">Plan Your Day, the Efficient Way!</h1>

<section class="container" id="section-01">
    <form method="POST" action="{{ route('storeTodo') }}" class="grid gafc cgap-2">
        @csrf
        <input type="text" name="title" class="form-control" placeholder="Title" required>
        <input type="text" name="description" class="form-control" placeholder="Description" required>
        <button type="submit" class="btn btn-default btn-success">Add</button>
    </form>
    
    
</section>
 

<section class="container mt-5" id="section-02">
    @foreach ($allTodos as $todo)
    <div class="grid shadow p-3 bround-3">
        <div class="grid gafc jcsb jisb">
            <h5>{{ $todo->title }}</h5>
            <div class="grid gtc-3 cgap-1">
                <a href="{{ url('/todo') }}"><button class="btn" type="button"><i class="fa-solid fa-pen-to-square fa-lg"
                        style="color: #43aa8b;"></i></button></a>
                <a href="{{ url('/todo/delete/'.$todo->id) }}"><button class="btn" type="button"><i class="fa-solid fa-trash-can fa-lg"
                        style="color: #d81159;"></i></button></a>
                <a href="{{ url('/todo') }}"><button class="btn" type="button"><i class="fa-solid fa-circle-check fa-lg"
                        style="color: #008000;"></i></button></a>
            </div>

        </div>
        <div class="grid">
            {{ $todo->description }}
        </div>
    </div>
    @endforeach
</section>


@endsection