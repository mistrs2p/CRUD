<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Public style css --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <title>{{ config('app.name', 'CrudApp') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
           
        </style>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>

    <script src="{{ asset('js/app.js') }}"></script>
</html>
