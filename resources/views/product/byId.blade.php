@extends('layouts.master')


@section('on_produce')
    class="active"
@stop


@section('content')
    <h1 class="page-header">View By Id</h1>

    <h2>Produce Information</h2>
    <a href="/produce/id/{{$produce->id}}/edit">Edit</a>
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

    <h2>Install Information</h2>
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
