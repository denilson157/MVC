<html>

<head>
    <title>@yield('title')</title>
</head>

<body>
    @section('sidebar')
    Uma bela barra superior (use a imaginação) <br>
    -------------------------------------------------------------------
    @show
    <div class="container">
    <p>teste</p>
        @yield('content')
    </div>
</body>

</html>
