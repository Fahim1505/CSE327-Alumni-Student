<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Alumni Portal' }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<header class="top-bar">
    <div class="top-bar-inner">
        <div class="brand">
            <span class="brand-logo">AP</span>
            <span class="brand-name">Alumni Portal</span>
        </div>

        <nav class="nav-links">
            <a href="{{ route('profile.show') }}">Profile</a>
            <a href="{{ route('donation.index') }}">Donations</a>
        </nav>
    </div>
</header>

<main class="page-wrapper">
    @yield('content')
</main>

</body>
</html>
