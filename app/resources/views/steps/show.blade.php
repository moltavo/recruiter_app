<!-- resources/views/steps/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Step {{ $step->id }}</h1>
    <p>Category: {{ $step->category }}</p>
    <p>Status: {{ $step->currentStatus->status_category }}</p>

    <h2>Timeline:</h2>
    <p>{{ $step->timeline->id }}</p>
@endsection
