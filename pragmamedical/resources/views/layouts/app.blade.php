<!DOCTYPE html>
<html lang="{{ $lang ?? 'az' }}">
<head>
    <meta charset="UTF-8">
    <title>Pragmamedical</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

<header>
    <a href="/az">AZ</a> |
    <a href="/ru">RU</a> |
    <a href="/en">EN</a>
</header>

<hr>

@yield('content')

</body>
</html>