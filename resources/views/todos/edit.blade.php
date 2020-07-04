@extends('todos.layout')

@section('content')
    <h1 class="text-2xl">Update this ToDo</h1>
    <h2>{{ $todo->title }}</h2>
    <x-alert />
    <form method="post" action="{{ route('todo.update', $todo->id) }}" class="py-5">
        @csrf
        @method('patch')
        <input type="text" name="title" value="{{ $todo->title }}" class="p-2 border rounded"/>
        <input type="submit" value="Update" class="p-2 border rounded"/>
    </form>

    <a href="/todos" class="m-5 p-1 bg-blue-300 cursor-pointer rounded text-white">
        Back</a>
@endsection