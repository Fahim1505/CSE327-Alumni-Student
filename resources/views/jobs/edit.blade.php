@extends('layouts.app')

@section('title', 'Edit Job')
@section('header', 'Edit Job')

@section('content')
<form action="{{ route('jobs.update', $job->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Job Title</label>
        <input type="text" name="job_title" class="form-control" value="{{ $job->job_title }}" required>
    </div>
    <div class="mb-3">
        <label>Company Name</label>
        <input type="text" name="company_name" class="form-control" value="{{ $job->company_name }}" required>
    </div>
    <div class="mb-3">
        <label>Job Type</label>
        <input type="text" name="job_type" class="form-control" value="{{ $job->job_type }}" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" required>{{ $job->description }}</textarea>
    </div>
    <div class="mb-3">
        <label>Dateline</label>
        <input type="date" name="dateline" class="form-control" value="{{ $job->dateline }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Job</button>
</form>
@endsection
