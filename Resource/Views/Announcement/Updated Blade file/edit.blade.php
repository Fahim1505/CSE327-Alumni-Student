<!DOCTYPE html>
<html>
<head>
    <title>Edit Announcement</title>
</head>
<body>

<h2>Edit Announcement</h2>

<form action="{{ route('announcement.update', $announcement->id) }}" method="POST">
    @csrf

    <label>Subject:</label><br>
    <input type="text" name="subject" value="{{ $announcement->subject }}" required><br><br>

    <label>Date:</label><br>
    <input type="date" name="date" value="{{ $announcement->date }}" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" rows="4" required>{{ $announcement->description }}</textarea><br><br>

    <button type="submit">Update Announcement</button>
</form>

<br>
<a href="{{ route('announcement.index') }}">Back to Announcements</a>

</body>
</html>
