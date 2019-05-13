<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="description" content="@yield('meta_description')">
</head>
<body>
<p>Имя: {!!$name!!}</p>

<p>Email: {!!$email!!}</p>

<p>Телефон: {!!$phone!!}</p>

<p>Текст письма: {!!$msg!!}</p>
</body>
</html>
