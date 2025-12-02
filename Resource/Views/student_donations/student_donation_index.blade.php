<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Donations</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<div class="container">

    <h1>Student Donations</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <div style="margin-bottom: 15px;">
        <a href="{{ route('student-donations.create') }}">Create New Donation</a>
    </div>

    @if($donations->count())
        <table border="1" cellpadding="8" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student ID</th>
                    <th>Donation ID</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Image</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donations as $donation)
                    <tr>
                        <td>{{ $donation->id }}</td>
                        <td>{{ $donation->student_id }}</td>
                        <td>{{ $donation->donation_id }}</td>
                        <td>{{ $donation->donation_type }}</td>
                        <td>{{ $donation->description }}</td>
                        <td>{{ $donation->amount }}</td>
                        <td>
                            @if($donation->image)
                            <img src="{{ asset('storage/' . $donation->image) }}" alt="Donation image" width="80">
                            @else
                            No image
                            @endif
                        </td>
                    <td>{{ $donation->created_at }}</td>
            <td>


                <a href="{{ route('student-donations.edit', $donation->id) }}">
                    Edit
                </a>
                <br><br>


                <form action="{{ route('student-donations.destroy', $donation->id) }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this donation?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="color: red;">Delete</button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No donations found.</p>
@endif

</body>
</html>