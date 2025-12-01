@extends('layouts.app')

@section('content')
<h1>Edit Job</h1>
<form action="{{ route('jobs.update', $job->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <label>Job Title</label>
    <input type="text" name="job_title" value="{{ $job->job_title }}" required>
    
    <label>Company Name</label>
    <input type="text" name="company_name" value="{{ $job->company_name }}" required>
    
    <label>Job Type</label>
    <input type="text" name="job_type" value="{{ $job->job_type }}" required>
    
    <label>Description</label>
    <textarea name="description" required>{{ $job->description }}</textarea>
    
    <label>Dateline</label>
    <input type="date" name="dateline" value="{{ $job->dateline }}" required>
    
    <button type="submit">Update Job</button>
</form>
@endsection
