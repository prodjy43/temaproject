<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        
    </head>
    <body>
        <nav>
            <h1>@yield('title')</h1>
        </nav>
       @yield('content')
       <footer>
           &copy; Copyright by Ivan Biedermann ! Made with &hearts;
       </footer>
    </body>
</html>
