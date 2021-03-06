<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            {{ env('APP_NAME', "Application") }}
        </title>

        <script>
          window.Laravel = <?php echo json_encode([
              'csrfToken' => csrf_token(),
          ]); ?>
        </script>
        <script src="{{ mix('js/manifest.js') }}" charset="utf-8"></script>
        <script src="{{ mix('js/vendor.js') }}" charset="utf-8"></script>
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
                {{ Session::get('danger') }}
            </div>
        @endif
        <div id='app'>
          @yield('app')
        </div>
        @yield('body')
    </body>
    @yield('state')
    <script src= {{ mix('js/app.js') }} charset="utf-8"></script>
    @yield('js')
</html>
