@extends('layouts.auth')

@section('content')


    <form class="form-signin" method='POST' action='/login'>
        {!! csrf_field() !!}

        <h2 class="form-signin-heading">Login</h2>
        <p>Don't have an account? <a href='/register'>Register here...</a></p>

        @if(count($errors) > 0)
            <ul class='errors'>
                @foreach ($errors->all() as $error)
                    <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <label for="username" class="sr-only">email</label>
        <input type="text" name="email" id="email" class="form-control first-of-type" placeholder="email" value='{{ old('email') }}'>

        <label for="inputPassword" class="sr-only">password</label>
        <input type="password" name="password" id="password" class="form-control last-of-type" placeholder="password">

        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember" id="remember"> Remember me
            </label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>

@stop
