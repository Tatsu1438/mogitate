<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
        @yield('css')
    <title></title>
</head>
<body>
    <header>
        <h1 class="title">mogitate</h1>
        @yield('header')
    </header>
    <main>
        <div style="display: block; margin: 30px;">
        </div>
        @yield('content')
    </main>
    <footer>
        @yield('footer')
    </footer>
</body>
</html>