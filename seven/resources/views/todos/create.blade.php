@extends('todos.layouts')

@section('content')

        <div class="flex justify-between border-b pb-4 px-4">
        <h1 class="text-2x1  pb-4">What next you need To-Do</h1>
        <a href="{{route ('todo.index')}}" class="mx-5 py-1  text-gray-400 cursor-pointer text-white">
        <span class="fas fa-arrow-left"></span>
        </a>
        </div>

        
        <x-alert />
        <form action="{{route ('todo.store')}}" method="post" class="py-5">
            @csrf
            <input type="text" name="title" class="px-2 py-2 border rounded">
            <input type="submit" value="Create" class="p-2 border rounded">
        </form>

        

@endsection