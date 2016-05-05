@extends('layouts.auth')

@section('content')


    <form class="form-signin" method='POST' action='/register'>
        {!! csrf_field() !!}

        <h2 class="form-signin-heading">Register</h2>
        <p>Already have an account? <a href='/login'>Login here...</a></p>

        @if(count($errors) > 0)
            <ul class='errors'>
                @foreach ($errors->all() as $error)
                    <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <label for="username" class="sr-only">username</label>
        <input type="text" name="username" id="username" class="form-control first-of-type" placeholder="username" value='{{ old('username') }}'>

        <label for="inputPassword" class="sr-only">last name</label>
        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="last name" value='{{ old('last_name') }}'>

        <label for="inputPassword" class="sr-only">first name</label>
        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="first name" value='{{ old('first_name') }}'>

        <label for="inputPassword" class="sr-only">email</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="email" value='{{ old('email') }}'>

        <label for="inputPassword" class="sr-only">cellphone</label>
        <input type="text" name="cellphone" id="cellphone" class="form-control" placeholder="cellphone" value='{{ old('cellphone') }}'>

        <label for="inputPassword" class="sr-only">password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="password">

        <label for="inputPassword" class="sr-only">Confirm Password</label>
        <input type="password" name="password_confirmation" id='password_confirmation' class="form-control last-of-type" placeholder="Confirm Password">

        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    </form>

@stop
