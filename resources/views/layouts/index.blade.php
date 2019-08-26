<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Desafio Westwing</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('layouts.navbar')
    <div class="container-fluid w-100 d-flex align-items-center justify-content-center"
        style="min-height: 90vh;">
        @yield('content')
    </div>
</body>
</html>
