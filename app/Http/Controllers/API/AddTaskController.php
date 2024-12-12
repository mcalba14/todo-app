<?php

namespace App\Http\Controllers\API;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddTaskController extends Controller
{
    public function createtasks(Request $request){
        // dd($request->all());
        $task = $request->all();
        $task = Task::create([
            'user_id' => $task['user_id'],
            'name' => $task['name'],
            'status' => $task['status'],
        ]);

        if($task){
            return response()->json([
                'status' => 'success',
                'message' => 'Task added successfully!',
            ]);
        }
    }
}
