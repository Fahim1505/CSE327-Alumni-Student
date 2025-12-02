<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Donation</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<div class="container">

    <h1>Edit Your Donation</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('student-donations.update', $donation->id) }}" 
        method="POST" 
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div>
            <label>Student ID</label>
            <input type="number" 
                name="student_id" 
                value="{{ old('student_id', $donation->student_id) }}" 
                required>
        </div>

        <div>
            <label>Donation ID</label>
            <input type="number" 
                name="donation_id" 
                value="{{ old('donation_id', $donation->donation_id) }}" 
                required>
        </div>

        <div>
            <label>Donation Type</label>
            <select name="donation_type" required>
                <option value="">Select type</option>
                @foreach(['Money','Food','Cloth','Books','Equipment','Other'] as $type)
                    <option value="{{ $type }}" 
                        {{ old('donation_type', $donation->donation_type) == $type ? 'selected' : '' }}>
                        {{ $type }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Description</label>
            <textarea name="description" rows="4">{{ old('description', $donation->description) }}</textarea>
        </div>

        <div>
            <label>Amount</label>
            <input type="number" 
                step="0.01" 
                name="amount" 
                value="{{ old('amount', $donation->amount) }}" 
                required>
        </div>

        <div>
            <label>Current Image</label><br>

            @if($donation->image)
                <img src="{{ asset('storage/' . $donation->image) }}" 
                alt="Donation Image" 
                width="120">
            @else
                <p>No image uploaded</p>
            @endif
        </div>

        {{-- NEW IMAGE UPLOAD --}}
        <div>
            <label>Replace Image (optional)</label>
            <input type="file" name="image" accept="image/*">
        </div>

        <button type="submit">Update Donation</button>

    </form>

    <br>

    <a href="{{ route('student-donations.index') }}">Back to All Student Donations</a>

</div>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>