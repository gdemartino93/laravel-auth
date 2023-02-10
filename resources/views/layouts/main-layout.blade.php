<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    @Vite('resources/js/app.js')
</head>
<body>
    
    <header>
        @include('components.header')
    </header>
    <main>
        @yield('contents')
    </main>
    <footer>
        {{-- @include('components.footer') --}}
    </footer>


</body>
</html>