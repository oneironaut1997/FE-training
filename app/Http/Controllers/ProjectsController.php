<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

class ProjectsController extends Controller
{
    public function index() {

    	$projects = Project::all();

    	// return $projects;

    	return view('projects.index', compact('projects'));
    }

    public function create() {

    	return view('projects.create');
    }

    public function show(Project $project) {

        // $project = Project::findOrFail($id);

        // return $project;

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

         Project::create(request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]));

        // Project::create($attributes);

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

        // dd(request()->all());

        // $project = Project::find($id);

       $project->update(request(['title', 'description']));

        // $project->title = request('title');
        // $project->description = request('description');

        // $project->save();

        return redirect('/projects');

    }

    public function destroy(Project $project) {
        // dd('Hello '.$id);

        $project->delete();

        return redirect('/projects');
    }
}
