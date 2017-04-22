<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <script>
            window.Laravel = { csrfToken: '{{ csrf_token() }}' };
        </script>
        <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
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
        <script src="/js/admin.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gentelella/1.3.0/js/custom.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.3/socket.io.min.js"></script>
        @yield('scripts')
        <script>
            /*
            var env = '{{ env('APP_ENV')  }}';
            let connect = '';
            alert(env)

            switch (env) {
                case 'local':
                    connect = 'http://192.168.33.10:8080';
                    break;
                case 'prod':
                    connect = 'http://192.168.33.10:8080';
                    break;
                default:
                    connect = 'http://192.168.33.10:8080';
            }
            */

            var socket = io('http://192.168.33.10:8080');
            socket.on('hello', (message)=> {
                console.log(message)
            })
        </script>
    </body>
</html>