<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Donation For Students</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<div class="container">

    <h1>Create Student Donation</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('student-donations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label>Student ID</label>
            <input type="number" name="donation_id" value="{{ old('donation_id') }}">
        </div>

        <div>
            <label>Donation ID</label>
            <input type="number" name="donation_id" value="{{ old('donation_id') }}" required>
        </div>

        <div>
            <label>Donation Type</label>
            <select name="donation_type" required>
            <option value="">Select type</option>
            @foreach(['Money','Food','Cloth','Books','Equipment','Other'] as $type)
                <option value="{{ $type }}" {{ old('donation_type') == $type ? 'selected' : '' }}>
                    {{ $type }}
            </option>
            @endforeach
            </select>
        </div>


        <div>
            <label>Description</label>
            <textarea name="description" rows="4">{{ old('description') }}</textarea>
        </div>


        <div>
            <label>Amount</label>
            <input type="number" step="0.01" name="amount" value="{{ old('amount') }}" required>
        </div>


        <div>
            <label>Image</label>
            <input type="file" name="image" accept="image/*">
        </div>


        <button type="submit">Save Donation</button>
        </form>


        <br>


        <a href="{{ route('student-donations.index') }}">View all student donations</a>


</div>


<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
