@extends('layouts.base')

@section('style')
@endsection

@section('app')
  <nav-bar title="{{ env('APP_NAME', "Application") }}" username="{{ $user->username }}">
  </nav-bar>
  <el-row type='flex' :gutter="20">
    <el-col :span='4'>
      <side-bar></side-bar>
    </el-col>
    <el-col :span='20'>
      <main id='main'>
        @yield('main')
        @yield('content')
      </main id='main'>
    </el-col>
  </el-row>
@endsection
