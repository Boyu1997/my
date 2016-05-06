<!DOCTYPE html>
<html>

    <head>
        <title>
            @yield('title','p4')
        </title>

        <meta charset='utf-8'>

        <link rel="icon" href="../../favicon.ico">

        <link href="/css/libraries/bootstrap.min.css" type='text/css' rel='stylesheet'>
        <link href="/css/layouts/auth.css" type='text/css' rel='stylesheet'>

        @yield('head')

    </head>
    <body>

        <div class="container">

            @yield('content')

        </div> <!-- /container -->

        <script src="/js/libraries/jquery.min.js"></script>
        <script src="/js/libraries/bootstrap.min.js"></script>
        @yield('body')

    </body>
</html>
