!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Donation</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<div class="container">

    <h1>Create Donation</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('donation.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label>Donation ID</label>
            <input type="number" name="donation_id" value="{{ old('donation_id') }}">
        </div>

        <div>
            <label>Donation Type</label>
            <select name="donation_type" required>
                <option value="">Select type</option>
                @foreach(['Money','food','cloth','Books','Equipment','Other'] as $type)
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
            <label>Image</label>
            <input type="file" name="image" accept="image/*">
        </div>

        <button type="submit">Save Donation</button>
    </form>

    <br>

    <a href="{{ route('donation.index') }}">View all donations</a>

</div>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
