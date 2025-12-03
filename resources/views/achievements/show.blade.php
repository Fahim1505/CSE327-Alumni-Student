@extends('layouts.app')

@section('title', 'Achievement Details')
@section('header', 'Achievement Details')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $achievement->title }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $achievement->category }}</h6>
        <p class="card-text">{{ $achievement->description }}</p>
        <p><strong>Date Achieved:</strong> {{ $achievement->date_achieved }}</p>
        <a href="{{ route('achievements.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection
