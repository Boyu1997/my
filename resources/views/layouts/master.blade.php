@extends('layouts.base')

@section('style')
  {{-- <link href="/css/libraries/bootstrap.min.css" type='text/css' rel='stylesheet'> --}}
  {{-- <link href="/css/libraries/chartist.min.css" type='text/css' rel='stylesheet'> --}}
  {{-- <link href="/css/libraries/theme.metro-dark.min.css" type='text/css' rel='stylesheet'> --}}
  {{-- <link rel="stylesheet" href="/css/layouts/master.css"> --}}
@endsection

@section('app')
  <nav-bar title="{{ env('APP_NAME', "Application") }}" username="{{ $user->username }}">
  </nav-bar>
  <el-row type='flex' :gutter="20">
    <el-col :span='4'>
      <side-bar></side-bar>
    </el-col>
    <main id='main'>
      @yield('content')
    </main id='main'>
  </el-row>
@endsection
