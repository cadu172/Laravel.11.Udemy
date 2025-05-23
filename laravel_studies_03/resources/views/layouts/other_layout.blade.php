<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title')</title>
</head>
<body>

    @section('top_bar')
        <div>Conteudo Original do TOP-BAR</div>
    @show
    <h1>Texto TOP do Layout</h1>
    @yield('content')
    <h1>Texto BOTTOM do Layout</h1>
    @yield('bottom_bar')

</body>
</html>
