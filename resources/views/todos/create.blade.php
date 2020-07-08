@extends('todos.layout')

@section('content')
    <h1 class="text-2xl">What next you nedd To-Do</h1>
    <x-alert />
<form method="post" action="{{ route('todos.store') }}" class="py-5">
        @csrf
        <input type="text" name="title" class="p-2 border rounded"/>
        <input type="submit" value="Create" class="p-2 border rounded"/>
    </form>

<a href=" {{ route('todos.index') }} " class="m-5 p-1 bg-blue-300 cursor-pointer rounded text-white">
        Back</a>
@endsection