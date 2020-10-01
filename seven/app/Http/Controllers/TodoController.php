<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Todo;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $todos = auth()->user()->todos->sortBy('completed');
        // $todos = Todo::orderBy('completed')->get();
        return view('todos.index',compact('todos'));
    }

    public function show(Todo $todo){
        return view('todos.show',compact('todo'));
    }

    public function create(){
        return view('todos.create');
    }

    public function store(TodoCreateRequest $request){

        auth()->user()->todos()->create($request->all()); //todos()->grab the relation ship
        // Todo::create($request->all());
        return redirect(route('todo.index'))->with('success','Todo created Successfully');
    }

    public function edit(Todo $todo){
        return view('todos.edit',compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo){
       $todo->update(['title'=>$request->title,'Description'=>$request->Description]);
       return redirect(route('todo.index'))->with('success','updated!');
    }

    public function complete(Todo $todo){
        $todo->update(['completed'=>true]);
        return redirect()->back()->with('success','Task Marked as completed!');
    }

    public function incomplete(Todo $todo){
        $todo->update(['completed'=>false]);
        return redirect()->back()->with('success','Task Marked as incompleted!'); 
    }

    public function destroy(Todo $todo){
        $todo->delete();
        return redirect()->back()->with('success','Task Deleted!');
    }
}
