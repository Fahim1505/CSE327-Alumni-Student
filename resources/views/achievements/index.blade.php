@extends('layouts.app')

@section('title', 'Achievements List')
@section('header', 'Achievements List')

@section('content')
<a href="{{ route('achievements.create') }}" class="btn btn-primary mb-3">Add Achievement</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Description</th>
            <th>Date Achieved</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($achievements as $achievement)
        <tr>
            <td>{{ $achievement->title }}</td>
            <td>{{ $achievement->category }}</td>
            <td>{{ $achievement->description }}</td>
            <td>{{ $achievement->date_achieved }}</td>
            <td>
                <a href="{{ route('achievements.edit', $achievement->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('achievements.destroy', $achievement->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                <a href="{{ route('achievements.show', $achievement->id) }}" class="btn btn-info btn-sm">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
