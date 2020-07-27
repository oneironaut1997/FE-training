@extends('layout')

@section('content')

    <h1 class="title">My {{ $foo }} Website!</h1>

    
    <ul>

    @foreach($tasks as $task)
        <li>{{ $task }}</li>
    @endforeach

    </ul>


@endsection