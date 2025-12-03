<!DOCTYPE html>
<html>

<head>
    <title>Alumni Portal - Photo Gallery</title>
    <style>
        body {
            font-family: Arial;
            background: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        /* Navbar */
        .navbar {
            width: 100%;
            background: #333;
            padding: 15px 40px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-title {
            font-size: 22px;
            font-weight: bold;
        }

        .nav-buttons a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            background: #555;
            padding: 8px 15px;
            border-radius: 5px;
        }

        .nav-buttons a:hover {
            background: #777;
        }

        .container {
            width: 90%;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px #0001;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f0f0f0;
        }

        img {
            width: 400px;
            height: auto;
            border-radius: 5px;
        }

        .btn-upload {
            background: #555;
            padding: 10px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 20px;
        }

        .btn-upload:hover {
            background: #777;
        }

        .btn-delete {
            background: #555;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-delete:hover {
            background: #777;
        }
    </style>
</head>

<body>

   
    <div class="navbar">
        <div class="navbar-title">Alumni Portal</div>
        <div class="nav-buttons">
            <a href="#">Student</a>
            <a href="#">Alumni</a>
        </div>
    </div>

    <div class="container">
        <h2>Alumni Photo Gallery</h2>
        <a class="btn-upload" href="/gallery/create">+ Upload New Photo</a>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Photo</th>
                <th>Caption</th>
                <th>Graduation Year</th>
                <th>Uploaded At</th>
                <th>Actions</th>
            </tr>

            @foreach ($photos as $photo)
                <tr>
                    <td>{{ $photo->id }}</td>
                    <td>{{ $photo->name }}</td>
                    <td><img src="{{ asset('storage/' . $photo->filePath) }}" alt="photo"></td>
                    <td>{{ $photo->caption }}</td>
                    <td>{{ $photo->graduationYear }}</td>
                    <td>{{ $photo->uploadedAt }}</td>

                    <td>
                        <form action="/gallery/delete/{{ $photo->id }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn-delete" onclick="return confirm('Delete this photo?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>

</body>

</html>
