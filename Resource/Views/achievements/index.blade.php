<!DOCTYPE html>
<html>

<head>
    <title>Achievement List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px 40px;
            background: #f2f2f2;
        }

        /* navigation bar */
        .navbar {
            width: 100%;
            background: #333;
            padding: 15px 40px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 6px;
            margin-bottom: 25px;
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
            transition: 0.2s;
        }

        .nav-buttons a:hover {
            background: #777;
        }


        h2 {
            color: #333;
            margin-bottom: 15px;
            font-size: 24px;
        }

        /* button */
        .btn-add {
            background: #333;
            color: #fff;
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 15px;
            transition: 0.2s;
        }

        .btn-add:hover {
            background: #555;
        }

        /* table */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }

        th {
            background: #333;
            color: white;
            padding: 12px;
            font-size: 14px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
            color: #555;
        }

        tr:hover {
            background: #f7f7f7;
        }

        img {
            width: 110px;
            border-radius: 6px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15);
        }

        /* action buttons */
        a.btn,
        button.btn {
            padding: 7px 12px;
            text-decoration: none;
            border-radius: 5px;
            color: white;
            font-size: 13px;
            margin-right: 5px;
        }

        .btn-edit {
            background: #333;
        }

        .btn-edit:hover {
            background: #555;
        }

        .btn-delete {
            background: #555;
            border: none;
        }

        .btn-delete:hover {
            background: #777;
        }

        form {
            display: inline;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <div class="navbar-title">Student Portal</div>
        <div class="nav-buttons">
            <a href="#">Student</a>
            <a href="#">Alumni</a>
        </div>
    </div>

    <h2>Student Achievements</h2>

    <a class="btn btn-add" href="{{ route('achievements.create') }}">+ Add Achievement</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Student</th>
            <th>Department</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>

        @foreach ($achievements as $ach)
            <tr>
                <td>{{ $ach->id }}</td>
                <td>{{ $ach->first_name }} {{ $ach->last_name }} ({{ $ach->student_id }})</td>
                <td>{{ $ach->department }}</td>
                <td>{{ $ach->title }}</td>
                <td>{{ $ach->description }}</td>
                <td>
                    @if ($ach->imagePath)
                        <img src="{{ asset('storage/' . $ach->imagePath) }}">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <a class="btn btn-edit" href="{{ route('achievements.edit', $ach->id) }}">Edit</a>

                    <form action="{{ route('achievements.destroy', $ach->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-delete" onclick="return confirm('Delete this?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

</body>

</html>
