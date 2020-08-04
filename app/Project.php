<?php

namespace App;

use App\Mail\ProjectCreated;
// use App\Events\ProjectCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
	protected $guarded = [];

	// protected $dispachesEvents = [
	// 	'created' => ProjectCreated::class
	// ];

	// protected static function boot() {

	// 	parent::boot();

	// 	static::created(function ($project) {
	// 		Mail::to($project->owner->email)->send(
	//             new ProjectCreated($project)
	//         );
	// 	});
	// }

	// protected $fillable = ['title', 'description'];
	// protected $fillable = ['owner_id'];

	public function owner() {

		return $this->belongsTo(User::class);
	}

	public function tasks() {

		return $this->hasMany(Task::class);
	}

	public function addTask($task) {

		$this->tasks()->create($task);

		// Task::create([
		// 	'project_id' => $this->id,
		// 	'description' => $description
		// ]);
	}
}

