@extends('layout')

@section('content')
	<h1 class="title">Edit project</h1>

	<form method="POST" action="/projects/{{ $project->id }}">
		
		@method('PATCH')
		@csrf
<!-- 		{{ method_field('PATCH') }}
		{{ csrf_field() }} -->
		
		<div class="field">
			<label for="title" class="label">Title</label>
		</div>

		<div class="control">	
			<input type="text" class="input" name="title" placeholder="Title" value="{{ $project->title }}">
		</div>

		<div class="field">
			<label for="description" class="label">Description</label>
		</div>

		<div class="control">	
			<textarea class="textarea" name="description">{{ $project->description }}</textarea>
		</div>

		<div class="field">
			<div class="control">	
				<button type="submit" class="button is-link">Update Project</button>
			</div>
		</div>

	</form>

	<form method="POST" action="/projects/{{ $project->id }}">
		
		@method('DELETE')
		@csrf
<!-- 		{{ method_field('DELETE') }}
		{{ csrf_field() }} -->

		<div class="field">
			<div class="control">	
				<button type="submit" class="button">Delete Project</button>
			</div>
		</div>

	</form>
@endsection