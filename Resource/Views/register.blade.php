<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-5">

<div class="container" style="max-width:700px;">

    <h2 class="mb-4 text-center">Alumni Registration Form</h2>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    {{-- ERROR MESSAGE --}}
    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Registration No.</label>
            <input type="text" name="reg_no" class="form-control" value="{{ old('reg_no') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Department</label>
            <input type="text" name="department" class="form-control" value="{{ old('department') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Graduation Year (YYYY)</label>
            <input type="text" name="graduation_year" class="form-control" value="{{ old('graduation_year') }}">
        </div>

        <button class="btn btn-primary w-100">Register</button>

    </form>
</div>

</body>
</html>
