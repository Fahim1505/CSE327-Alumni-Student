@extends('layouts.app')

@section('content')
<h1>{{ $job->job_title }}</h1>
<p><strong>Company:</strong> {{ $job->company_name }}</p>
<p><strong>Type:</strong> {{ $job->job_type }}</p>
<p><strong>Description:</strong> {{ $job->description }}</p>
<p><strong>Dateline:</strong> {{ $job->dateline }}</p>
<a href="{{ route('jobs.index') }}">Back to Jobs</a>
@endsection
