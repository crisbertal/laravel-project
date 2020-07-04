@extends('todos.layout')

@section('content')
<div class="flex justify-center border-b pb-3">
    <h1 class="text-2xl">All ToDos</h1>
    <a href="/todos/create" class="mx-5 p-1 bg-blue-500 cursor-pointer rounded text-white">Create new</a>
</div>
<ul class="my-5">
    <x-alert />
    @foreach ($todos as $todo)
    <li class="flex justify-between py-2">
       <p> {{ $todo->title }} </p>
       <div>
            <a href="{{'/todos/' . $todo->id . '/edit'}}" class="mx-5 p-1 bg-orange-400 cursor-pointer rounded text-white">Edit</a>
            <span class="fas fa-check px-2" />
       </div>
    </li>
    @endforeach
</ul>
@endsection