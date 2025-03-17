<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ninja Network</title>

    @vite('resources/css/app.css')
</head>
<body class="!h-screen overflow-auto">

    @if (session('success'))
        <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold">
        {{ session('success') }}
        </div>
    @endif

    <header>
        <nav>
            <h1>Ninja Network</h1>
            <a href="{{ route('ninjas.index') }}">All Ninjas</a>
            <a href="{{ route('ninjas.create') }}">Create New Ninja</a>
        </nav>
    </header>
    <main class="container h-[calc(100vh_-_100px)] overflow-auto">
        {{ $slot }}
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        var flash = document.getElementById('flash');
        
        if (flash) {
            setTimeout(function () {
            flash.remove(); 
            }, 2000);
        }
        });
    </script>
</body>
</html>
