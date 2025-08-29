<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use  App\Models\Task;

class ToDoController extends Controller
{
    
    function createToDo(Request $request){
        Task::create([
            'task_name' => $request->name,
            'work'=> $request->work,
            'date'=> $request->date
        ]);

        return redirect()->route('home');
    }

    function homePage(){
        $tasks = Task::all();
        // $tasks = DB::select('select * from tasks');
        return view('home',['tasks'=>$tasks]);
    }

// for delete thge task----------
    function delete($id) {
        Task::find($id)->delete();

        return redirect()->back();
    }

// to first edit than update the task--------
    function edit($id) {
        $task = Task::find($id);
        return view('layout/update',['task'=>$task]);
    }

    function update(Request $request, $id) {
        
        $task = Task::find($id);

        $task->update([
            'task_name' => $request->name,
            'work'=> $request->work,
            'date'=> $request->date
        ]);

        return redirect()->route('home');

    }

}
