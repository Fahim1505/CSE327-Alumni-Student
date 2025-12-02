<!DOCTYPE html>
<html>
<head>
    <title>Add Event</title>
</head>
<body>

<h2>Add Event</h2>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Event Title:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Event Image:</label><br>
    <input type="file" name="image"><br><br>

    <label>Date:</label><br>
    <input type="date" name="date" required><br><br>

    <label>Venue:</label><br>
    <input type="text" name="venue" required><br><br>

    <button type="submit">Submit</button>
</form>

<br>
<a href="{{ route('event.index') }}">View All Events</a>
<br>
<br>

<a href="/logout" class="btn btn-danger">Logout</a>

</body>
</html>
