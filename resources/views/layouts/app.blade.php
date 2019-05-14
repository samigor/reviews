<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="description" content="@yield('meta_description')">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('css')}}/app.css" />
		<link rel="stylesheet" type="text/css" media="all" href="{{asset('comments/css')}}/comments.css" />


		<script type="text/javascript" src="{{asset('js')}}/app.js" /></script>
		<script type="text/javascript" src="{{asset('comments/js')}}/comment-reply.js" /></script>
		<script type="text/javascript" src="{{asset('comments/js')}}/comment-scripts.js" /></script>
</head>
<body>
    <div id="app">
      @include('layouts.header')

        <main class="py-4">
            @yield('content')
            @yield('comments')	
        </main>
    </div>
     <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
</body>
</html>
