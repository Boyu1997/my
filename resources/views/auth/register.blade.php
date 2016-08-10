@extends('layouts.auth')

@section('content')


    <form class="form-signin" method='POST' action='/register'>
        {!! csrf_field() !!}

        <h2 class="form-signin-heading">注册</h2>
        <p>已有账户？<a href='/login'>点击这里登录</a></p>

        @if(count($errors) > 0)
            <ul class='errors'>
                @foreach ($errors->all() as $error)
                    <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <label for="username" class="sr-only">用户名</label>
        <input type="text" name="username" id="username" class="form-control first-of-type" placeholder="用户名" value='{{ old('username') }}'>

        <label for="inputPassword" class="sr-only">姓氏</label>
        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="姓氏" value='{{ old('last_name') }}'>

        <label for="inputPassword" class="sr-only">名字</label>
        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="名字" value='{{ old('first_name') }}'>

        <label for="inputPassword" class="sr-only">邮箱地址</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="邮箱地址" value='{{ old('email') }}'>

        <label for="inputPassword" class="sr-only">手机号</label>
        <input type="text" name="cellphone" id="cellphone" class="form-control" placeholder="手机号" value='{{ old('cellphone') }}'>

        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="密码">

        <label for="inputPassword" class="sr-only">重复密码</label>
        <input type="password" name="password_confirmation" id='password_confirmation' class="form-control last-of-type" placeholder="重复密码">

        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    </form>

@stop
