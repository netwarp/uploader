<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/css/front/index.css">
        <title>Uploader</title>
    </head>
    <body>
        <div class="container-fluid">
            <header>
                <div class="row">
                    <div class="col-md-2">
                        <a href="/">
                            <img src="/img/logo.png" alt="logo" id="logo">
                        </a>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-5 btn-line">
                        <a href="#" class="btn btn-info pull-right">aa</a>
                        <a href="#" class="btn btn-primary pull-right">aa</a>
                    </div>
                </div>
            </header>
            <nav>
                <ul>
                    <li><a href="#">Menu</a></li>
                    <li><a href="#">Menu</a></li>
                    <li><a href="#">Menu</a></li>
                    <li><a href="#">Menu</a></li>
                </ul>
            </nav>
            <section>
                <div class="row">
                    <div class="col-md-2 sidebar">
                        <ul>
                            @for($i = 0; $i < 20; $i++)
                                <li><a href="#">tag</a></li>
                            @endfor
                        </ul>
                    </div>
                    <main class="col-md-10" >
                        @yield('content')
                    </main>
                </div>
            </section>
            <footer>
                <div class="row">
                    <div class="col-md-12">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas ex, unde magni soluta voluptate vitae officiis quia, sit animi alias neque, quasi aut laborum, rem quibusdam sequi explicabo autem inventore?
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>