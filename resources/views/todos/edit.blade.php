@extends('todos.layout')

@section('content')
    <h1 class="text-2xl">Update this ToDo</h1>
    <h2>{{ $todo->title }}</h2>
    <x-alert />
    <form method="post" action="{{ route('todos.update', $todo->id) }}" class="py-5">
        @csrf
        @method('patch')
        <div class="p-1">
            <input type="text" name="title" value="{{ $todo->title }}" class="p-2 border rounded"/>
        </div>
        <div class="p-1">
            <textarea name="description" class="p-2 border rounded">{{ $todo->description }}</textarea>
        </div>
        <div class="p-1">
            <input type="submit" value="Update" class="p-2 border rounded"/>
        </div>
    </form>

<a href="{{ route('todos.index') }}" class="m-5 p-1 bg-blue-300 cursor-pointer rounded text-white">
        Back</a>
@endsection