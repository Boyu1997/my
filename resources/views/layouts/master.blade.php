<!doctype html>
<html>

    <head>
        <title>
            @yield('title','p4')
        </title>

        <meta charset='utf-8'>

        <link href="/css/libraries/bootstrap.min.css" type='text/css' rel='stylesheet'>
        <link href="/css/libraries/chartist.min.css" type='text/css' rel='stylesheet'>
        <link href="/css/layouts/master.css" type='text/css' rel='stylesheet'>

        @yield('head')

    </head>

    <body>

        @if(Session::get('success')!=null)
            <div id="flash_success" class="alert alert-success" role="alert">{{Session::get('success')}}</div>
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
                    <a class="navbar-brand" href="#">Project name</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Settings</a></li>
                        <li><a href="#">Profile</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $user->username }}<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/logout">logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Search...">
                    </form>
                </div>
            </div>
        </nav>






        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li @yield('on_home')>
                            <a href="/">Home<span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                    @if ($user->employee_id == 0)
                        <hr class="nav-hr">
                        <ul class="nav nav-sidebar">
                            <li><a href="">Apply</a></li>
                        </ul>
                    @elseif ($employee->privilege_id == 0)
                        <hr class="nav-hr">
                        <ul class="nav nav-sidebar">
                            <li @yield('on_wage')><a href="/wage">Wage</a></li>
                            <li @yield('on_produce')><a href="/produce">Produce</a></li>
                            <li><a href="/trip">Trip</a></li>
                            <li @yield('on_install')><a href="/install">Install</a></li>
                            <li><a href="/maintenance">Maintenance</a></li>
                        </ul>
                    @elseif ($privilege->master_admin)
                        <hr class="nav-hr">
                        <ul class="nav nav-sidebar">
                            <li @yield('on_wage')><a href="/wage">Wage</a></li>
                            <li><a href="/trip">Trip</a></li>
                        </ul>
                        <hr class="nav-hr">
                        <ul class="nav nav-sidebar">
                            <li @yield('on_produce')><a href="/produce">Produce</a></li>
                            <li @yield('on_install')><a href="/install">Install</a></li>
                            <li><a href="/maintenance">Maintenance</a></li>
                        </ul>
                        <hr class="nav-hr">
                        <ul class="nav nav-sidebar">
                            <li><a href="/customer">Customer</a></li>
                        </ul>
                        <hr class="nav-hr">
                        <ul class="nav nav-sidebar">
                            <li><a href="/admin/employee">Employees</a></li>
                            <li><a href="/admin/user">Users</a></li>
                        </ul>
                    @endif
                    <hr class="nav-hr">
                    <ul class="nav nav-sidebar">
                        <li><a href="">Account</a></li>
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
        @yield('body')

    </body>

</html>
