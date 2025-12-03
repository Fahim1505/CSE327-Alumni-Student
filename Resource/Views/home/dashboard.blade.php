<h2>Welcome {{ session('name') }} (Reg: {{ session('reg_no') }})</h2>
<hr>
<p>You are successfully logged in.</p>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Dashboard</h2>

<!-- Registration Button -->
<a href="{{ route('register') }}">
    <button style="margin:10px; padding:10px 20px;">Registration</button>
</a>

<!-- Event Module Button -->
<a href="{{ route('event.create') }}">
    <button style="margin:10px; padding:10px 20px;">Event Module</button>
</a>

<!-- Announcement Module Button -->
<a href="{{ route('announcement.create') }}">
    <button style="margin:10px; padding:10px 20px;">Announcement Module</button>
</a>

</body>
</html>


<a href="/logout" class="btn btn-danger">Logout</a>
