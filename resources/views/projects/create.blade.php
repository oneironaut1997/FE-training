@extends('layout')

@section('title', 'Create project')

@section('content')

	<h1 class="title">Create a New Project</h1>

	<form method="POST" action="/projects">

		{{ csrf_field() }}

		<div class="field">
			<label for="title" class="label">Title</label>
		</div>
		
		<div class="control">
			<input type="text" class="input {{ $errors->has('title') ? 'is-danger' : ''}}" name="title" placeholder="Project Title" value="{{ old('title') }}" required="">
		</div>

		<div class="field">
			<label for="description" class="label">Description</label>
		</div>

		<div class="control">
			<textarea class="textarea {{ $errors->has('title') ? 'is-danger' : ''}}" name="description" placeholder="Project Description" required="">{{ old('description') }}</textarea>
		</div>

		<div>
			<button type="submit" class="button is-link">Create Project</button>
		</div>
		
		@include ('errors')

	</form>

@endsection