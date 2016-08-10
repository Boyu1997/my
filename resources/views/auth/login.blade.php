@extends('layouts.auth')

@section('content')


    <form class="form-signin" method='POST' action='/login'>
        {!! csrf_field() !!}

        <h2 class="form-signin-heading">登录</h2>
        <p>没有账户？<a href='/register'>点击这里注册</a></p>

        @if(count($errors) > 0)
            <ul class='errors'>
                @foreach ($errors->all() as $error)
                    <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <label for="username" class="sr-only">邮箱地址</label>
        <input type="text" name="email" id="email" class="form-control first-of-type" placeholder="邮箱地址" value='{{ old('email') }}'>

        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" name="password" id="password" class="form-control last-of-type" placeholder="密码">

        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember" id="remember">记住我</input>
            </label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>

@stop
