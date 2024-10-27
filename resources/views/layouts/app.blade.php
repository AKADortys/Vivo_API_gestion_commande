<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @yield('head')
</head>
<body>
    @include('partials.header')
    <aside>
        @yield('aside')
    </aside>

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>
