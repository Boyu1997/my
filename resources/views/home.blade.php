@extends('layouts.master')

@section('on_home')
    class="active"
@stop

@section('content')
    <h1 class="page-header">Home</h1>

    <div class="dropdown">
  <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown trigger
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dLabel">
    ...
  </ul>
</div>
@stop
