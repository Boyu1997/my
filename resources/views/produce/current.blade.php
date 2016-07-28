@extends('layouts.master')


@section('on_produce')
    class="active"
@stop

@section('head')
    <link href="/css/produce/current.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <h1 class="page-header">正在生产</h1>

    <div aria-label="Justified button group" role="group" class="btn-group btn-group-justified">
        <a id="nav_bar" class="btn btn-default disabled" href="#">全部记录</a>
    </div>
    @if(sizeof($produces))
        <table id="currentTable" class="tablesorter">
                    <thead>
                        <tr>
                            <th>型号</th>
                            <th>序列号</th>
                            <th>开始时间</th>
                            <th>生产者</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produces as $produce)
                            <tr>
                                <td>{{ $produce->model }}</td>
                                <td>{{ $produce->serial_number }}</td>
                                <td>{{ $produce->start_at }}</td>
                                <td>{{ $produce->employee->user->last_name }} {{ $produce->employee->user->first_name }}</td>
                                <td><a href="/product/id/{{ $produce->id }}">查看</a></td>
                            </tr>
                        @endforeach

                    </tbody>
        </table>
    @else
        <div class="panel panel-default">
            <div class="panel-body">
                <h3>抱歉...</h3>
                <p4>没有找到任何记录，快去开始新的生产吧。</p4>
            </div>
        </div>
    @endif

    </div>

@stop

@section('body')
    <script>
        $(document).ready(function () {
            $("table.sortable").addClass("tablesorter");
            $('table.tablesorter').tablesorter({
                'theme': 'metro-dark',
                'widgets':['zebra'],
                'sortList' : [[0,0]]
            });
        });
    </script>
@stop
