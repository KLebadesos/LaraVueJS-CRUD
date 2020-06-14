<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request){
        //dd($request->all());
        $data = Task::create([
            'name'          => $request->name,
            'profession'    => $request->profession,
            'task'          => $request->task
        ]);

        return $data;
    }

    public function getTask(){
        $data = Task::all();
        return $data;
    }

    public function delete(Request $request){
        $data = Task::find($request->id)->delete();
    }
 
    public function edit(Request $request, $id){
        $data = Task::find($id);

        $data->update([
            'name'          => $request->get('value_1'),
            'profession'    => $request->get('value_2'),
            'task'          => $request->get('value_3')
        ]);

        $data->save();

        return $data;

    }
}
