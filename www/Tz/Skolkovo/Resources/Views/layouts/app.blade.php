<!DOCTYPE html>
<html lang="ru">
<head>
    <title>home page</title>
    <meta name="viewport" content="width=device-width">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/assets/css/screen.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="/assets/js/foundation.min.js"></script>
    <script src="/assets/js/libs.js"></script>
    <script src="/assets/js/script.js"></script>
</head>
<body>
@include('skolkovo::includes.header')
@yield('content')
@include('skolkovo::includes.footer')
</body>
</html>