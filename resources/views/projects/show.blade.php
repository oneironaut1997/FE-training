@extends('layout')

@section('title', 'Projects')

@section('content')
	
	<h1 class="title">{{ $project->title }}</h1>

{{-- 	@can('update', $project)
		<a href="">Update</a>
	@endcan --}}
	
	<div class="cotent">
		{{ $project->description }}
		<p>
			<a href="/projects/{{ $project->id }}/edit">Edit</a>
		</p>
	</div>

	
	@if ($project->tasks->count())
	<div class="box">
		<ul>
			@foreach ($project->tasks as $task)
				<li>
					<form method="POST" action="/completed-tasks/{{ $task->id }}">
						<!-- @method('PATCH') -->

						@if ($task->completed)
							@method('DELETE')
						@endif
							
						@csrf
						<label for="completed" class="checkbox {{ $task->completed ? 'is-complete' : '' }}">
							<input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
							{{ $task->description }}
						</label>
					</form>
				</li>
			@endforeach
			</ul>
	</div>
	@endif

	<!-- add new task here -->

	<form method="POST" action="{{ route('web.projects.store', ['project' => $project->id]) }}" class="box">

		@csrf
		<div class="field">
			<label for="description" class="label">New Task</label>
			
			<div class="control">
				<input type="text" class="input" name="description" placeholder="New Task" required="">
			</div>
		</div>

		<div class="field">
			<div class="control">
				<button type="submit" class="button is-link">Add Task</button>
			</div>
		</div>

		@include ('errors')
	</form>

	

@endsection	