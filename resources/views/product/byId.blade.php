@extends('layouts.master')


@section('head')
    <link href="/css/product/byId.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <h1 class="page-header">View All</h1>
    <div class="headline">
        <h2>Produce Information</h2>
        <p> &nbsp; <a href="/produce/edit/id/{{$produce->id}}">Edit</a></p>
    </div>
    <table class="table table-bordered">
        @foreach($produce as $key => $value)
            @if(!preg_match('/id/', $key))
                <tr>
                    <th>{{ $key }}</th>
                    <th>{{ $value }}</th>
                </tr>
            @endif
        @endforeach
    </table>
    <div class="headline">
        <h2>Install Information</h2>
        @if(sizeof($install))
            <p> &nbsp; <a href="/install/edit/id/{{$install->id}}">Edit</a></p>
        @endif
    </div>
    @if(sizeof($install))
        <table class="table table-bordered">
            @foreach($install as $key => $value)
                @if(!preg_match('/id/', $key))
                    <tr>
                        <th>{{ $key }}</th>
                        <th>{{ $value }}</th>
                    </tr>
                @endif
            @endforeach
        </table>
    @else
        <p>No install information found, <a href="/install/create">add a record now</a>.</p>
    @endif

@stop
