@extends('layouts.app')

@section('content')
<h1>Add New Job</h1>
<form action="{{ route('jobs.store') }}" method="POST">
    @csrf
    <label>Job Title</label>
    <input type="text" name="job_title" value="{{ old('job_title') }}" required>
    
    <label>Company Name</label>
    <input type="text" name="company_name" value="{{ old('company_name') }}" required>
    
    <label>Job Type</label>
    <input type="text" name="job_type" value="{{ old('job_type') }}" required>
    
    <label>Description</label>
    <textarea name="description" required>{{ old('description') }}</textarea>
    
    <label>Dateline</label>
    <input type="date" name="dateline" value="{{ old('dateline') }}" required>
    
    <button type="submit">Add Job</button>
</form>
@endsection
