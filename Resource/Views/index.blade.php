<!DOCTYPE html>
<html>
<head>
    <title>All Events</title>
</head>
<body>

<h2>Event List</h2>

<a href="{{ route('event.create') }}">➕ Add New Event</a><br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Date</th>
        <th>Venue</th>
        <th>Image</th>
    </tr>

    @foreach($events as $event)
    <tr>
        <td>{{ $event->id }}</td>
        <td>{{ $event->title }}</td>
        <td>{{ $event->date }}</td>
        <td>{{ $event->venue }}</td>
        <td>
            @if($event->image)
                <img src="{{ asset('uploads/events/'.$event->image) }}" width="80">
            @else
                No Image
            @endif
        </td>
    </tr>
    @endforeach

</table>

</body>
</html>
