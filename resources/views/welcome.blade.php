<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>
        {{ config('app.name', 'Laravel') }}
    </title>

    <x-cssbootstrap></x-cssbootstrap>
</head>

<body>

    <x-navbarcomponent></x-navbarcomponent>

    <h1 style="text-align: center; margin: 50px 20px;">
        Welcome to University Management System
    </h1>

    <div class="text-center">

        @auth

            <a
                href="{{ route('dashboard') }}"
                class="btn btn-primary"
            >
                Go to Dashboard
            </a>

        @else

            <a
                href="{{ route('login') }}"
                class="btn btn-primary"
            >
                Login
            </a>

            <a
                href="{{ route('register') }}"
                class="btn btn-secondary"
            >
                Register
            </a>

        @endauth

    </div>

    <x-jsbootstrap></x-jsbootstrap>

</body>

</html>