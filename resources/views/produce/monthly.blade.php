@extends('layouts.master')


@section('on_produce')
    class="active"
@stop


@section('content')
    <h1 class="page-header">Produce</h1>

    <p>Here is your profomance on {{ $month }}/{{ $year }}.</p>



@stop
