<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/css/app.css">
        <title>Uploader</title>
    </head>
    <body>
        <div class="container-fluid">
        <header>
            <div class="row">
                <div class="col-md-3">
                    <a href="/">
                        <img src="http://placehold.it/50x50" alt="logo" id="logo">
                    </a>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-5">
                    <a href="#" class="btn btn-info">aa</a>
                    <a href="#" class="btn btn-primary">aa</a>
                </div>
            </div>
        </header>
        <section>
            @yield('content')
        </section>
        </div>
    </body>
</html>