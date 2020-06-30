@extends('todos.layout')

@section('content')
<div class="flex justify-center">
    <h1 class="text-2xl">All ToDos</h1>
    <a href="/todos/create" class="mx-5 p-1 bg-blue-300 cursor-pointer rounded text-white">Create new</a>
</div>
<ul class="my-5">
    @foreach ($todos as $todo)
    <li>
        {{ $todo->title }} 
    </li>
    @endforeach
</ul>
@endsection