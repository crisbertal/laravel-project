@extends('todos.layout')

@section('content')
    <h1 class="text-2xl">{{$todo->title}}</h1>
    <h2 class="py-2 text-xl">{{$todo->description}}</h2>

    <a href=" {{ route('todos.index') }} " class="m-5 p-1 bg-blue-300 cursor-pointer rounded text-white">Back</a>
@endsection