<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel e Blade</title>
</head>
<body>
    <h1>Header Information</h1>
    <hr />
    @yield("content")
    <hr />
    <h1>Bottom Information</h1>
</body>
</html>
