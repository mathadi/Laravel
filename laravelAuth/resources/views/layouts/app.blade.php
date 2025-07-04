<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen flex flex-col">
    <header class="flex justify-between items-center px-8 py-4 bg-gray-100 shadow">
        @include('layouts.header')
    </header>

    <main class="flex-1 flex items-center justify-center">
        @yield('content')
    </main>

    <footer class="w-full">
        <div class="text-center py-4 bg-gray-200">
            <p class="text-gray-600">&copy; {{ date('Y') }} Laravel Auth. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>