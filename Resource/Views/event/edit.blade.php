<!DOCTYPE html>
<html>
<head>
    <title>Edit Event</title>
</head>
<body>

<h2>Edit Event</h2>

<form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Event Title:</label><br>
    <input type="text" name="title" value="{{ $event->title }}" required><br><br>

    <label>Event Date:</label><br>
    <input type="date" name="date" value="{{ $event->date }}" required><br><br>

    <label>Venue:</label><br>
    <input type="text" name="venue" value="{{ $event->venue }}" required><br><br>

    <label>Image (Upload to change):</label><br>
    <input type="file" name="image"><br><br>

    @if($event->image)
        <img src="{{ asset('uploads/events/'.$event->image) }}" width="100"><br><br>
    @endif

    <button type="submit">Update Event</button>
</form>

<br>
<a href="{{ route('event.index') }}">Back to Events</a>

</body>
</html>
