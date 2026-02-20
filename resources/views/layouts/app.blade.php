<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Home')</title>

    <!-- Tailwind CDN (temporary) -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    @stack('styles')
</head>
<body class="overflow-x-hidden bg-gray-50 min-h-screen flex flex-col">

    <!-- Navbar (GLOBAL) -->
    @include('components.navbar')

    <!-- Page Content -->
    <main class="flex-grow pt-24">
        @yield('content')
    </main>

    @include('components.footer')

    @stack('scripts')
</body>
</html>