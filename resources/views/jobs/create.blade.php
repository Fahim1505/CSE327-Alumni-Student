@extends('layouts.app')

@section('title', 'Add Job')
@section('header', 'Add New Job')

@section('content')
<form action="{{ route('jobs.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Job Title</label>
        <input type="text" name="job_title" class="form-control" value="{{ old('job_title') }}" required>
    </div>
    <div class="mb-3">
        <label>Company Name</label>
        <input type="text" name="company_name" class="form-control" value="{{ old('company_name') }}" required>
    </div>
    <div class="mb-3">
        <label>Job Type</label>
        <input type="text" name="job_type" class="form-control" value="{{ old('job_type') }}" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
    </div>
    <div class="mb-3">
        <label>Dateline</label>
        <input type="date" name="dateline" class="form-control" value="{{ old('dateline') }}" required>
    </div>
    <button type="submit" class="btn btn-success">Add Job</button>
</form>
@endsection
