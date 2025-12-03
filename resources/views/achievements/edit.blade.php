@extends('layouts.app')

@section('title', 'Edit Achievement')
@section('header', 'Edit Achievement')

@section('content')
<form action="{{ route('achievements.update', $achievement->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" value="{{ $achievement->title }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <input type="text" name="category" value="{{ $achievement->category }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" required>{{ $achievement->description }}</textarea>
    </div>

    <div class="mb-3">
        <label for="date_achieved" class="form-label">Date Achieved</label>
        <input type="date" name="date_achieved" value="{{ $achievement->date_achieved }}" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Achievement</button>
</form>
@endsection
