<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function dashboard(Request $request){
        $userId = $request->all();
        // dd($userId['id']);

        $pending = Task::where('user_id', $userId['id'])->where('status', 'Pending');
        $completed = Task::where('user_id', $userId['id'])->where('status', 'Completed');

        $pend = $pending->get()->count();
        $comp = $completed->get()->count();





        // if ($query->count() > 0) {
        //     // $details = collect($data)->map(function ($d) {
        //     //     return [
        //     //         'user_id' => $d['oltrap']['barangay_name']['name'],
        //     //         'station_name' => $d['oltrap']['station_name'],
        //     //         'datetime' => $d['datetime_captured'],
        //     //         'egg' => $d['predicted'],
        //     //     ];
        //     // });
            return response()->json([
                'status' => 'success',
                'data' => ['pending' => $pend, 'completed' => $comp],
            ]);
        // } else {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'No Data',
        //     ]);
        // }

    }

    public function tasks($userId){

        $query = Task::where('user_id', $userId)->where('status', 'Pending');

        $data = $query->get()->toArray();

        if ($query->count() > 0) {
            // $details = collect($data)->map(function ($d) {
            //     return [
            //         'user_id' => $d['oltrap']['barangay_name']['name'],
            //         'station_name' => $d['oltrap']['station_name'],
            //         'datetime' => $d['datetime_captured'],
            //         'egg' => $d['predicted'],
            //     ];
            // });
            return response()->json([
                'status' => 'success',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'No Data',
            ]);
        }
    }

    public function update(Request $request){
        $task = $request->all();
        $query = Task::where('id', $task['id'])->update(['status' => "Completed"]);

        if($query){
            return response()->json([
                'status' => 'success',
                'message' => 'Task completed successfully!',
            ]);
        }
    }
    public function delete(Request $request){
        $task = $request->all();
        $query = Task::where('id', $task['id'])->delete();

        if($query){
            return response()->json([
                'status' => 'success',
                'message' => 'Task deleted successfully!',
            ]);
        }
    }
}
