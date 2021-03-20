<html>

<head>
    <title>@yield('title')</title>
</head>

<body>
    @section('sidebar')
    @show
    Uma bela barra superior (use a imaginação) <br>
    -------------------------------------------------------------------
    <div class="container">
        <p>teste</p>
        @yield('content')
    </div>
</body>

</html>
