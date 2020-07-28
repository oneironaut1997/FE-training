<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;

use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{

	public function store(Project $project) {

		// $attributes = request()->validate(['description' => 'required']);

		// $project->addTask($attributes);
		// Task::create([
		// 	'project_id' => $project->id,
		// 	'description' => request('description')
		// ]);

		$project->addTask(
			request()->validate(['description' => 'required'])
		);

		return back();


	}


  //   public function update(Task $task) {

  //   	// dd(request()->all());

  //   	// if (request()->has('completed')) {
  //   	// 	$task->complete();
  //   	// } else {
  //   	// 	$task->incomplete();
  //   	// }

  //   	// request()->has('complted') ? $task->complete() : $task->incomplete();

  //   	$method = request()->has('completed') ? 'complete' : 'incomplete';

		// $task->method();

  //   	// $task->complete(request()->has('completed'));

  //   	// $task->update([
  //   	// 	'completed' => request()->has('completed')
  //   	// ]);

  //   	return back();
  //   }
}
