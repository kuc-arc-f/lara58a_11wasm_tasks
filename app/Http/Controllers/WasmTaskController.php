<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

//
class WasmTaskController extends Controller
{
    //
    /**************************************
     *
     **************************************/
    public function index()
    {
//var_dump("#index");
        $tasks = Task::orderBy('id', 'desc')->paginate(10 );
        return view('wasm/tasks/index')->with('tasks', $tasks);
    }
    /**************************************
     *
     **************************************/
    public function create()
    {
// var_dump("#create");
        return view('wasm/tasks/create')->with('task', new Task());
    }
    /**************************************
     *
     **************************************/
    public function show($id)
    {
        $task = Task::find($id);
        return view('wasm/tasks/show')->with('task_id', $id );
    }
    /**************************************
     *
     **************************************/
    public function edit($id)
    {
        $task = Task::find($id);
        return view('wasm/tasks/edit')->with('task_id', $id);
    }         
}
