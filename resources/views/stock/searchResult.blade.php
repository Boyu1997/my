@extends('layouts.master')


@section('on_produce')
    class="active"
@stop

@section('head')
    <link href="/css/produce/searchResult.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <h1 class="page-header">搜索</h1>

    <div aria-label="Justified button group" role="group" class="btn-group btn-group-justified">
        <a id="search_nav" class="btn btn-default disabled" href="#">搜索结果</a>
    </div>
    @if(sizeof($produces))
        <table id="monthly_table" class="tablesorter">

                    <thead>
                        <tr>
                            <th>型号</th>
                            <th>序列号</th>
                            <th>开始时间</th>
                            <th>结束时间</th>
                            <th>成产者</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produces as $produce)
                            <tr>
                                <td>{{ $produce->model }}</td>
                                <td>{{ $produce->serial_number }}</td>
                                <td>{{ $produce->start_at }}</td>
                                <td>{{ $produce->end_at }}</td>
                                <td>{{ $produce->employee->user->last_name.$produce->employee->user->first_name }}</td>
                                <td><a href="/product/id/{{ $produce->id }}">查看</a></td>
                            </tr>
                        @endforeach

                    </tbody>
        </table>
    @else
        <div class="panel panel-default">
            <div class="panel-body">
                <h3>抱歉...</h3>
                <p4>没有找到任何数据，放宽搜索条件试试。</p4>
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
