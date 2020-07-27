<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;

use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{

	public function store(Project $project) {

		$attributes = request()->validate(['description' => 'required']);

		$project->addTask($attributes);
		// Task::create([
		// 	'project_id' => $project->id,
		// 	'description' => request('description')
		// ]);

		return back();


	}


    public function update(Task $task) {

    	// dd(request()->all());

    	$task->update([
    		'completed' => request()->has('completed')
    	]);

    	return back();
    }
}
