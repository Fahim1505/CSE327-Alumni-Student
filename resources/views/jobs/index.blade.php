@extends('layouts.app')

@section('content')
<h1>Jobs List</h1>
<a href="{{ route('jobs.create') }}">Add Job</a>
<table>
    <thead>
        <tr>
            <th>Job Title</th>
            <th>Company</th>
            <th>Job Type</th>
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
            <td>{{ $job->dateline }}</td>
            <td>
                <a href="{{ route('jobs.edit', $job->id) }}">Edit</a>
                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
