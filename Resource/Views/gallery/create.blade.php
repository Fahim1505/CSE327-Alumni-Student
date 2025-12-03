<!DOCTYPE html>
<html>

<head>

    <title>Upload Photo</title>
    <style>
        /*navigation bar includes student-alumni*/
        .top-bar {
            background: #111827;
            color: #f9fafb;
            padding: 10px 0;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.18);
        }

        .top-bar-inner {
            max-width: 960px;
            margin: 0 auto;
            padding: 0 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-logo {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #1f2937;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 14px;
        }

        .brand-name {
            font-weight: 600;
            font-size: 15px;
            letter-spacing: 0.04em;
        }

        .nav-links a {
            margin-left: 16px;
            font-size: 14px;
            opacity: 0.9;
            color: #f9fafb;
            text-decoration: none;
            transition: 0.2s;
        }

        .nav-links a:hover {
            opacity: 1;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f3f3f3;
            padding: 30px;
        }

        /* form  */
        .container {
            width: 420px;
            margin: 40px auto;
            background: white;
            padding: 28px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.12);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 15px;
            font-size: 22px;
        }


        label {
            font-weight: bold;
            display: block;
            margin-top: 12px;
            color: #555;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: 0.2s;
        }

        input:focus {
            border-color: #333;
            outline: none;
            box-shadow: 0 0 5px rgba(51, 51, 51, 0.4);
        }

        /* button */
        .btn {
            background: #333;
            color: white;
            padding: 10px;
            width: 100%;
            margin-top: 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: 0.2s;
        }

        .btn:hover {
            background: #555;
        }

        /* error */
        .errors {
            background: #ffe5e5;
            padding: 10px 12px;
            border-left: 4px solid #d9534f;
            margin-bottom: 18px;
            border-radius: 4px;
        }

        /*to go back*/
        .back-link {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }

        .back-link:hover {
            color: #555;
        }
    </style>
</head>

<body>


    <div class="top-bar">
        <div class="top-bar-inner">
            <div class="brand">
                <div class="brand-logo">SP</div>
                <div class="brand-name">Student Portal</div>
            </div>

            <div class="nav-links">
                <a href="#">Student</a>
                <a href="#">Alumni</a>
            </div>
        </div>
    </div>

    <!-- form upload -->
    <div class="container">
        <h2>Upload New Photo</h2>

        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/gallery/store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label>Name:</label>
            <input type="text" name="name" required>

            <label>Photo:</label>
            <input type="file" name="filePath" required>

            <label>Caption:</label>
            <input type="text" name="caption" required>

            <label>Graduation Year:</label>
            <input type="text" name="graduationYear" required>

            <button class="btn" type="submit">Upload Photo</button>
        </form>

        <a class="back-link" href="/gallery">⬅ Back to Gallery</a>
    </div>

</body>

</html>
