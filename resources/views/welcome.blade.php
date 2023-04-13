<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'EventGO')}}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body class="welcome-page">
        <div class="my-5 container d-flex justify-content-center">
            <img src="{{ asset('images/Grouplogo.png')}}" alt="logo">
        </div>
        <div class="my-2 container d-flex justify-content-center">
            <h1 class="text-light">EventGO</h1>
        </div>
        <div class="my-5 d-flex flex-column justify-content-around align-items-center container text-center">
            <a class="go-login-register-btn my-2 py-1" href="{{ route('login') }}">Login</a>
            <a class="go-login-register-btn my-2 py-1" href="{{ route('register') }}">Register</a>
        </div>
        <div class="my-2 container d-flex justify-content-center">
            <p class="text-light fw-bold">Ready, set, PARTY....</p>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    </body>
</html>
