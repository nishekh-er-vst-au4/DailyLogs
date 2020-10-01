@extends('todos.layouts')

@section('content')

        <div class="flex justify-between border-b pb-4 px-4">
        <h1 class="text-2x1  pb-4">{{$todo->title}}</h1>
        <a href="{{route('todo.index')}}" class="mx-5 py-1  text-gray-400 cursor-pointer text-white">
        <span class="fas fa-arrow-left"></span>
        </a>
        </div>

        <div>
            <div>
                <p>{{$todo->Description}}</p>
            </div>
        </div>

        

@endsection