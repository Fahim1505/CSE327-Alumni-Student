@extends('layouts.app')

@section('title', 'Jobs List')
@section('header', 'Jobs List')

@section('content')
<a href="{{ route('jobs.create') }}" class="btn btn-primary mb-3">Add Job</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Job Title</th>
            <th>Company</th>
            <th>Job Type</th>
            <th>Description</th> <!-- Added -->
            <th>Dateline</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jobs as $job)
        <tr>
            <td>{{ $job->job_title }}</td>
            <td>{{ $job->company_name }}</td>
            <td>{{ $job->job_type }}</td>
            <td>{{ $job->description }}</td> <!-- Added -->
            <td>{{ $job->dateline }}</td>
            <td>
                <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-info btn-sm">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
