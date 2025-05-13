<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flux-ui/dist/flux-ui.min.css">
</head>
<body class="flux-container p-4">
    <nav class="flux-navbar mb-4">
        <h1 class="flux-text-lg font-bold">My Admin Panel</h1>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>
