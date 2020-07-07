@extends('todos.layout')

@section('content')
<div class="flex justify-center border-b pb-3">
    <h1 class="text-2xl">All ToDos</h1>
    <a href="/todos/create" class="mx-5 py-2 text-blue-500 cursor-pointer rounded text-white">
        <span class="fas fa-plus-circle"/>
    </a>
</div>
<ul class="my-5">
    <x-alert />
    @foreach ($todos as $todo)
    <li class="flex justify-between py-2">
        <div>
            @include('todos.complete-button')
        </div>
        @if ($todo->completed)
            <p class="line-through"> {{ $todo->title }} </p>
        @else
            <p> {{ $todo->title }} </p>
        @endif
       <div>
            <a href="{{'/todos/' . $todo->id . '/edit'}}" class="py-1 cursor-pointer rounded" > <span class="fas fa-edit text-orange-400 px-2"/></a>
       </div>
    </li>
    @endforeach
</ul>
@endsection