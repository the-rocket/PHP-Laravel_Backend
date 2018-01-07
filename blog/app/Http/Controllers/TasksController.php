<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    //Task Controller
    public function index() {
    	dd(Task::all());
    	$tasks = Task::all();
    	return view('tasks.index', compact('tasks'));
    }

    public function show($id) {
		$task = Task::find($id);
	    return view('tasks.show', compact('task'));
    }
}
