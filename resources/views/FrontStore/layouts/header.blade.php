<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <link rel="icon" type="image/png" href="{{ asset('storage/logo/logo.png') }}?v={{ time() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('storage/logo/logo.png') }}?v={{ time() }}">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
