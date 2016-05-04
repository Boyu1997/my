<!DOCTYPE html>
<html>

    <head>
        <title>
            @yield('title','p4')
        </title>

        <meta charset='utf-8'>

        <link rel="icon" href="../../favicon.ico">

        <link href="/css/layouts/bootstrap.min.css" type='text/css' rel='stylesheet'>
        <link href="/css/layouts/auth.css" type='text/css' rel='stylesheet'>

        @yield('head')

    </head>
    <body>

        <div class="container">

            @yield('content')

        </div> <!-- /container -->

        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        @yield('body')

    </body>
</html>
