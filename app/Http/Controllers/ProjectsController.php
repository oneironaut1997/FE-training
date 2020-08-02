<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Services\Twitter;
// use App\Mail\ProjectCreated;
use App\Events\ProjectCreated;

use Illuminate\Filesystem\Filesystem;

class ProjectsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

    	// $projects = Project::all();
        // auth()->id();
        // auth()->user();
        // auth()->check();
        // if (auth()->guest())

        // $projects auth()->user()->projects;

        // $projects = Project::where('owner_id', auth()->id())->get();
        // $projects = Project::where('owner_id', auth()->id())->take(2)->get();

        // cache()->rememberForever('stats', function () {
        //     return ['lessons' => 1300, 'hours' => 50000, 'series' => 100];
        // });

        // $stats = cache()->get('stats');

        // dump($stats);

        // dump($projects);
    	// return $projects;

    	// return view('projects.index', compact('projects'));

        return view('projects.index', [
            'projects' => auth()->user()->projects
        ]);
    }

    public function create() {

    	return view('projects.create');
    }

    public function show(Project $project, Twitter $twitter) {

        // $filesystem = app('Illuminate\Filesystem\Filesystem');
        // $twitter = app('twitter');

        // dd($twitter);

    // public function show(Filesystem $file) {

        // dd($file->get());

        // $project = Project::findOrFail($id);

        // return $project;

        // if ($project->owner_id !== auth()->id()) {
        //     abort(403);
        // }

        // abort_unless(auth()->user()->owns($project), 403);

        // abort_if($project->owner_id !== auth()->id(), 403);

        // $this->authorize('view', $project);
        // $this->authorize('update', $project);
        // abort_if()
        // abort_unless()

        // if (\Gate::denies('update', $project)) {
        //     abort(403);
        // }
        // abort_if(\Gate::denies('update', $project), 403);

        // abort_unless(\Gate::allows('update', $project), 403);



        return view('projects.show', compact('project'));

    }

    public function store() {
        // dd(request()->all());

        // dd(request(['title', 'description']));

        // dd([
        //     'title' => request('title'),
        //     'description' => request('description')
        // ]);

        // Project::create(request()->all());

        // return 'done';


        // return [
        //     'title' => request('title'),
        //     'description' => request('description')
        // ];

        // Project::create([
        //     'title' => request('title'),
        //     'description' => request('description')
        // ]);

    	// $project = new Project();

    	// $project->title = request('title');
    	// $project->description = request('description');

    	// $project->save();

        // request()->validate([
        //     'title' => ['required', 'min:3'],
        //     'description' => ['required', 'min:3']
        // ]);

        // Project::create(request(['title', 'description']));

        //  Project::create(request()->validate([
        //     'title' => ['required', 'min:3'],
        //     'description' => ['required', 'min:3']
        // ]));
        // $attributes = request()->validate([
        //     'title' => ['required', 'min:3'],
        //     'description' => ['required', 'min:3']
        // ]);

        $attributes = $this->validateProject();

        $attributes['owner_id'] = auth()->id();

        // Project::create($attributes);


        $project = Project::create($attributes);

        event(new ProjectCreated($project));

        // \Mail::to($project->owner->email)->send(
        //     new ProjectCreated($project)
        // );

        // Project::create($attributes + ['owner_id' => auth()->id()]);

    	return redirect('/projects');

    	// return request()->all();
    	// return request('title');
    	// return request('description');
    }

    public function edit(Project $project) {

        // return $id;
        // $project = Project::findOrFail($id);

        return view('projects.edit', compact('project'));

    }

    public function update(Project $project) {

        // $this->authorize('update', $project);

        // dd(request()->all());

        // $project = Project::find($id);

        // $attributes = request()->validate([
        //     'title' => ['required', 'min:3'],
        //     'description' => ['required', 'min:3']
        // ]);

       // $project->update(request(['title', 'description']));

        // $project->title = request('title');
        // $project->description = request('description');

        // $project->save();

        $project->update($this->validateProject());

        return redirect('/projects');

    }

    public function destroy(Project $project) {
        // dd('Hello '.$id);

        // $this->authorize('update', $project);

        $project->delete();

        return redirect('/projects');
    }


    public function validateProject() {

        return request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);

    }
}
