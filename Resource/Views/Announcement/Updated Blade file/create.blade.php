<!DOCTYPE html>
<html>
<head>
    <title>Add Announcement</title>
</head>
<body>

<h2>Add Announcement</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form action="{{ route('announcement.store') }}" method="POST">
    @csrf

    <label>Subject:</label><br>
    <input type="text" name="subject" required><br><br>

    <label>Date:</label><br>
    <input type="date" name="date" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" rows="4" required></textarea><br><br>

    <button type="submit">Add Announcement</button>

</form>

<br>
<a href="{{ route('announcement.index') }}">View All Announcements</a>
<br>
<br>

    <a href="/logout" class="btn btn-danger">Logout</a>

</body>
</html>
