<!DOCTYPE html>
<html>

<head>
    <title>Edit Achievement</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background: #edf1f5;
            display: flex;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 720px;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
        }

        h2 {
            font-size: 26px;
            margin-bottom: 10px;
            color: #333;
            text-align: center;
        }

        a.back-link {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #444;
            font-size: 14px;
        }

        label {
            display: block;
            margin-top: 18px;
            font-weight: bold;
            font-size: 14px;
            color: #333;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            background: #fafafa;
            transition: 0.2s;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #2196F3;
            outline: none;
            background: #fff;
            box-shadow: 0 0 4px rgba(33, 150, 243, 0.3);
        }

        textarea {
            resize: vertical;
        }

        button {
            margin-top: 22px;
            padding: 12px;
            width: 100%;
            background: #333;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.2s;
        }

        button:hover {
            background: #555;
        }

        .error {
            background: #ffecec;
            border-left: 4px solid red;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
            color: #c00;
        }

        img.preview {
            margin-top: 10px;
            width: 180px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>

    <div class="container">

        <h2>Edit Achievement</h2>
        <a href="{{ route('achievements.index') }}" class="back-link">← Back to List</a>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('achievements.update', $achievement->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Student ID</label>
            <input type="text" name="student_id" placeholder="Enter Student ID"
                value="{{ old('student_id', $achievement->student_id) }}" required>

            <label>First Name</label>
            <input type="text" name="first_name" placeholder="Enter First Name"
                value="{{ old('first_name', $achievement->first_name) }}" required>

            <label>Last Name</label>
            <input type="text" name="last_name" placeholder="Enter Last Name"
                value="{{ old('last_name', $achievement->last_name) }}" required>

            <label>Department</label>
            <select name="department" required>
                @foreach ($departments as $dept)
                    <option value="{{ $dept }}"
                        {{ old('department', $achievement->department) == $dept ? 'selected' : '' }}>
                        {{ $dept }}
                    </option>
                @endforeach
            </select>

            <label>Title</label>
            <input type="text" name="title" placeholder="Achievement Title"
                value="{{ old('title', $achievement->title) }}" required>

            <label>Description</label>
            <textarea name="description" rows="4" required>{{ old('description', $achievement->description) }}</textarea>

            <label>Current Image</label>
            @if ($achievement->imagePath)
                <img src="{{ asset('storage/' . $achievement->imagePath) }}" class="preview">
            @else
                <p>No image uploaded</p>
            @endif

            <label>Change Image (optional)</label>
            <input type="file" name="imagePath">

            <button type="submit">Update Achievement</button>
        </form>

    </div>

</body>

</html>
