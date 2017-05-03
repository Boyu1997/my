@extends('layouts.base')

@section('style')
  {{-- <link href="/css/libraries/bootstrap.min.css" type='text/css' rel='stylesheet'> --}}
  {{-- <link href="/css/libraries/chartist.min.css" type='text/css' rel='stylesheet'> --}}
  {{-- <link href="/css/libraries/theme.metro-dark.min.css" type='text/css' rel='stylesheet'> --}}
  {{-- <link rel="stylesheet" href="/css/layouts/master.css"> --}}
@endsection

@section('main')
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
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout</a>
                            </li>
                        </ul>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
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
                          <li @yield('on_produce')><a href="{{ url('produce') }};">生产</a></li>
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
                      <li @yield('on_stock')><a href="/stock">库存</a></li>
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
@endsection
