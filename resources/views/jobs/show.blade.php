@extends('layouts.app')

@section('title', $job->job_title)
@section('header', $job->job_title)

@section('content')
<p><strong>Company:</strong> {{ $job->company_name }}</p>
<p><strong>Type:</strong> {{ $job->job_type }}</p>
<p><strong>Description:</strong> {{ $job->description }}</p>
<p><strong>Dateline:</strong> {{ $job->dateline }}</p>
<a href="{{ route('jobs.index') }}" class="btn btn-secondary">Back to Jobs</a>
@endsection
