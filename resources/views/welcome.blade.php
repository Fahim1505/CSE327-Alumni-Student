<!-- resources/views/jobs/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Add Job</title>
</head>
<body>
    <h1>Add Job</h1>

    <!-- Show validation errors -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jobs.store') }}" method="POST">
        @csrf

        <label>Job Title:</label><br>
        <input type="text" name="job_title" value="{{ old('job_title') }}"><br><br>

        <label>Company Name:</label><br>
        <input type="text" name="company_name" value="{{ old('company_name') }}"><br><br>

        <label>Job Type:</label><br>
        <input type="text" name="job_type" value="{{ old('job_type') }}"><br><br>

        <label>Description:</label><br>
        <textarea name="description">{{ old('description') }}</textarea><br><br>

        <label>Dateline:</label><br>
        <input type="date" name="dateline" value="{{ old('dateline') }}"><br><br>

        <button type="submit">Add Job</button>
    </form>
</body>
</html>
