<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Achievement Form</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f1f1f1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
   /*form*/
        .form-container {
            background: #fff;
            padding: 25px 30px;
            width: 350px;
            border-radius: 12px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.15);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 22px;
            letter-spacing: 0.5px;
        }

        label {
            font-weight: bold;
            color: #555;
            font-size: 14px;
        }

        .form-container input,
        .form-container select,
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: 0.2s;
        }

        .form-container input:focus,
        .form-container select:focus,
        .form-container textarea:focus {
            border-color: #333;
            outline: none;
            box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.2);
        }
        /*button*/

        button {
            width: 100%;
            padding: 10px;
            border: none;
            background: #333;
            color: #fff;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.2s;
        }

        button:hover {
            background: #555;
        }

        .errors {
            background: #ffe5e5;
            padding: 10px;
            border-left: 4px solid #d9534f;
            margin-bottom: 15px;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>Student Achievement</h2>

        
        <form action="{{ route('achievements.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
                <div class="errors">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <label>Student ID</label>
            <input type="text" name="student_id" value="{{ old('student_id') }}" required>

            <label>First Name</label>
            <input type="text" name="first_name" value="{{ old('first_name') }}" required>

            <label>Last Name</label>
            <input type="text" name="last_name" value="{{ old('last_name') }}" required>

            <label>Department</label>
            <select name="department" required>
                <option value="CSE" {{ old('department') == 'CSE' ? 'selected' : '' }}>CSE</option>
                <option value="EEE" {{ old('department') == 'EEE' ? 'selected' : '' }}>EEE</option>
                <option value="BBA" {{ old('department') == 'BBA' ? 'selected' : '' }}>BBA</option>
                <option value="ENG" {{ old('department') == 'ENG' ? 'selected' : '' }}>ENG</option>
            </select>

            <label>Title</label>
            <input type="text" name="title" value="{{ old('title') }}" required>

            <label>Description</label>
            <textarea name="description" rows="3" required>{{ old('description') }}</textarea>

            <label>Upload Image</label>
            <input type="file" name="imagePath">

            <button type="submit">Submit</button>
        </form>
    </div>

</body>

</html>
