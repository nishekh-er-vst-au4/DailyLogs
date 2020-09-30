@extends('todos.layouts')

@section('content')

<div class="flex justify-between border-b pb-4 px-4">
<h1 class="2xl">All Your Todos</h1>
<a href="{{route ('todo.create')}}" class="mx-5 py-1  text-blue-400 cursor-pointer text-white">
<span class="fas fa-plus-circle"></span>
</a>
<a href="/" class="mx-5 py-1  text-green-400 cursor-pointer text-white">
<span class="fas fa-home"></span></a>
</div>

<ul class="my-5">
    <x-alert />
    @forelse($todos as $todo)

    <li class="flex justify-between p-2">
        <div>
        @include('todos.complete-button')
        </div>
        @if($todo->completed)
        <p class="line-through">{{$todo->title}}</p>
        @else
        <p>{{$todo->title}}</p>
        @endif
        
        <div>
        <a href="{{route('todo.edit',$todo->id)}}" 
        class="text-orange-400 cursor-pointer  text-white">
        <span class="fas fa-edit px-2"></span></a>

        <span class="fas fa-trash text-red-400 px-2 cursor-pointer" 
        onclick="event.preventDefault();
        if(confirm('Are you really want to delete?')){
            document.getElementById('form-delete-{{$todo->id}}').submit()
        }"></span>
        <form style="display:none" id="{{'form-delete-'.$todo->id}}" method="post" 
              action="{{route('todo.destroy',$todo->id)}}" >
        @csrf
        @method('delete')

        </form>
        </div> 
        
    </li>
    @empty

    <p>No task available. Create one</p>

    @endforelse
</ul>

@endsection