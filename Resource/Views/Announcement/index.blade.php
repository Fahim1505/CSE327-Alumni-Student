<!DOCTYPE html>
<html>
<head>
    <title>All Announcements</title>
</head>
<body>

<h2>Announcements</h2>

<a href="{{ route('announcement.create') }}">➕ Add New Announcement</a><br><br>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Subject</th>
        <th>Date</th>
        <th>Description</th>
        <th>Action</th>
    </tr>

@foreach($announcements as $announcement)
<tr>
    <td>{{ $announcement->id }}</td>
    <td>{{ $announcement->subject }}</td>
    <td>{{ $announcement->date }}</td>
    <td>{{ $announcement->description }}</td>
    <td>
        <a href="{{ route('announcement.edit', $announcement->id) }}">✏ Edit</a> |
        <a href="{{ route('announcement.delete', $announcement->id) }}"
           onclick="return confirm('Are you sure to delete?')">🗑 Delete</a>
    </td>
</tr>
@endforeach

</table>

</body>
</html>
