<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    //
    function index(Request $req) {
        $id = $req->session()->get('user');
        $task = Task::where('user_id', $id)->get();
        // return $task;
        return view('list', ['tasks' => $task]);
    }

    function addTask(Request $req) {
        $id = $req->session()->get('user');

        Task::create([
            'user_id' => $id,
            'task' => $req->task,
            'due_time' => $req->time,
        ]);

        // $result = Task::where('user_id', $id)->get();
        // return view('list', ['tasks' => $result]);
        return back();
    }

    function completed(Request $req) {
        $obj = new Task;
        $id = $req->session()->get('user');
        $result = $obj->where('user_id', $id)->onlyTrashed()->get();
        return view('completed', ['tasks' => $result]);
        // return "It works";
    }

    function sDelete(Request $req, $id) {
        Task::where('id', $id)->delete();
        // $result = Task::where('user_id', 1)->get();

        // return view('list', ['tasks' => $result]);
        return back();
    }

    function deletePermanently(Request $req, $id) {
        Task::where('id', $id)->forceDelete();
        return back();
    }

    function editTask() {
        return view('edit');
    }
}
