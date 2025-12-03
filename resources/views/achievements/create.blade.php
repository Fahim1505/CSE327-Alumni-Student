@extends('layouts.app')

@section('title', 'Add Achievement')
@section('header', 'Add Achievement')

@section('content')
<form action="{{ route('achievements.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <input type="text" name="category" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label for="date_achieved" class="form-label">Date Achieved</label>
        <input type="date" name="date_achieved" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Add Achievement</button>
</form>
@endsection
