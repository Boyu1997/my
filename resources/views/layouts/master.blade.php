<!doctype html>
<html>

    <head>
        <title>
            @yield('title','艾美康办公系统')
        </title>

        <meta charset='utf-8'>

        <link href="/css/libraries/bootstrap.min.css" type='text/css' rel='stylesheet'>
        <link href="/css/libraries/chartist.min.css" type='text/css' rel='stylesheet'>
        <link href="/css/layouts/master.css" type='text/css' rel='stylesheet'>
        <link href="/css/libraries/theme.metro-dark.min.css" type='text/css' rel='stylesheet'>
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

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="http://my.aimeikang.cc">艾美康办公系统</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="http://www.aimeikang.cc">艾美康</a></li>
                        <li><a href="#">帮助</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $user->username }}<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/logout">logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>






        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li @yield('on_home')>
                            <a href="/">首页<span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                    @if (!sizeof($employee))
                        <hr class="nav-hr">
                        <ul class="nav nav-sidebar">
                            <li><a href="">Apply</a></li>
                        </ul>
                    @elseif ($privilege->produce || $privilege->install || $privilege->maintenance)
                        <hr class="nav-hr">
                        <ul class="nav nav-sidebar">
                            @if($privilege->produce)
                                <li @yield('on_produce')><a href="/produce">生产</a></li>
                            @endif
                            @if($privilege->install || $produce->maintenance)
                                @if($privilege->install)
                                    <li @yield('on_install')><a href="/install">Install</a></li>
                                @endif
                                @if($privilege->maintenance)
                                    <li @yield('on_maintenance')><a href="/maintenance">Maintenance</a></li>
                                @endif
                                <li @yield('on_trip')><a href="/trip">Trip</a></li>
                            @endif
                            <li @yield('on_wage')><a href="/wage">Wage</a></li>
                        </ul>
                    @elseif ($privilege->sale)
                        <hr class="nav-hr">
                        <ul class="nav nav-sidebar">
                            <li @yield('on_sales')><a href="/sale">销售</a></li>
                            <li @yield('on_contract')><a href="/contract">Contract</a></li>
                            <li @yield('on_wage')><a href="/wage">Wage</a></li>
                            <li @yield('on_install')><a href="/trip">Trip</a></li>
                        </ul>
                    @elseif ($privilege->master_admin)
                        <hr class="nav-hr">
                        <ul class="nav nav-sidebar">
                            <li @yield('on_wage')><a href="/wage">Wage</a></li>
                            <li @yield('on_trip')><a href="/trip">Trip</a></li>
                        </ul>
                        <hr class="nav-hr">
                        <ul class="nav nav-sidebar">
                            <li @yield('on_produce')><a href="/produce">生产</a></li>
                            <li @yield('on_install')><a href="/install">Install</a></li>
                            <li @yield('on_maintenance')><a href="/maintenance">Maintenance</a></li>
                        </ul>
                        <hr class="nav-hr">
                        <ul class="nav nav-sidebar">
                            <li @yield('on_sale')><a href="/sale">销售</a></li>
                            <li @yield('on_customer')><a href="/customer">Customer</a></li>
                            <li @yield('on_contract')><a href="/contract">Contract</a></li>
                        </ul>
                        <hr class="nav-hr">
                        <ul class="nav nav-sidebar">
                            <li @yield('on_employee')><a href="/employee">员工</a></li>
                            <li @yield('on_user')><a href="/user">User</a></li>
                        </ul>
                    @endif
                    <hr class="nav-hr">
                    <ul class="nav nav-sidebar">
                        <li @yield('on_account')><a href="/account">Account</a></li>
                    </ul>

                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

                    <section>
                        @yield('content')
                    </section>

                </div>
            </div>
        </div>


        <script src="/js/libraries/jquery.min.js"></script>
        <script src="/js/libraries/bootstrap.min.js"></script>
        <script src="/js/libraries/chartist.min.js"></script>
        <script src="/js/libraries/jquery-ui.min.js"></script>
        <script src="/js/libraries/jquery.tablesorter.min.js"></script>
        <script src="/js/libraries/jquery.tablesorter.widgets.min.js"></script>
        <script>
            $("div.alert").delay(3000).slideUp();
        </script>
        @yield('body')

    </body>

</html>
