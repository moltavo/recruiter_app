<!-- resources/views/steps/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Steps</h1>
    <ul>
        @foreach ($steps as $step)
            <li><a href="{{ route('steps.show', $step->id) }}">{{ $step->id }}</a></li>
        @endforeach
    </ul>
@endsection
