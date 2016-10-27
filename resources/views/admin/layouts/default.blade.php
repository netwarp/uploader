<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        @yield('styles')
        <title>@yield('title')</title>
    </head>
    <body class="nav-md">
        <div class="container body" id="app">
            <div class="main_container">

                @include('admin.includes.left_col')

                @include('admin.includes.top_nav')

                @include('admin.includes.right_col')

                @include('admin.includes.footer')
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gentelella/1.3.0/js/custom.js"></script>

        @yield('scripts')
    </body>
</html>