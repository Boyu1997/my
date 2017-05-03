<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            @yield('title','艾美康办公系统')
        </title>

        <script>
          window.Laravel = <?php echo json_encode([
              'csrfToken' => csrf_token(),
          ]); ?>
        </script>

        <link href="/css/app.css" type='text/css' rel='stylesheet'>
        {{-- <link rel="stylesheet" href="/css/layouts/master.css"> --}}
        @yield('style')
        @yield('head')
    </head>

    <body>
        @if(Session::get('success')!=null)
            <div class="flash_message alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @endif
        @if(Session::get('danger')!=null)
            <div class="flash_message alert alert-danger" role="alert">
                {{Session::get('danger')}}
            </div>
        @endif

        @yield('main')
        @yield('body')
    </body>
    @yield('state')
    <script src="/js/app.js" charset="utf-8"></script>
    @yield('js')
</html>
