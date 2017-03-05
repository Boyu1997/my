@extends('layouts.master')


@section('on_produce')
    class="active"
@stop

@section('head')
    <link href="/css/stock/overview.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <h1 class="page-header">库存概览</h1>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><strong>新项目</strong></h4>
            <p> &nbsp; <a href="/sale/create/new">添加</a></p>
        </div>
        <div class="panel-body">
            @if(sizeof($current_stocks))
                <table class="tablesorter info_table">
                    <thead>
                        <tr>
                            <th>名称</th>
                            <th>类型</th>
                            <th>品牌</th>
                            <th>序列号</th>
                            <th>剩余数量</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($current_stocks as $current_stock)
                            <tr>
                                <td>{{ $current_stock->name }}</td>
                                <td>{{ $current_stock->category }}</td>
                                <td>{{ $current_stock->brand }}</td>
                                <td>{{ $current_stock->serial_number }}</td>
                                <td>{{ $current_stock->remain_ammount }}</td>
                                <td><a href="/stock/id/{{ $current_stock->id }}">查看</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="not_found_text">
                    <h3>抱歉...</h3>
                    <p4>没有查任何记录。快去发现更多的项目，就会有更多的收获。</p4>
                </div>
            @endif
        </div>
    </div>

    <hr>

    <div aria-label="Justified button group" role="group" class="btn-group btn-group-justified">
        @if ($privilege->master_admin)
            <a class="btn btn-default" href="/produce/create" target="_blank">新建记录</a>
        @else
            @if (\App\Produce::where('employee_id', '=', $employee->id)->where('end_at', '=', '')->count())
                <a class="btn btn-default" href="/produce/edit/id/{{ \App\Produce::where('employee_id', '=', $employee->id)->where('end_at', '=', '')->pluck('id')->first() }}">当前生产</a>
            @else
                <a class="btn btn-default" href="/produce/create">新建记录</a>
            @endif
        @endif
        <a class="btn btn-default" href="/produce/{{ date('Y') }}/{{ date('m') }}">按月查看</a>
        @if ($privilege->master_admin)
            <a class="btn btn-default" href="/produce/current">正在生产</a>
            <a class="btn btn-default" href="/produce/search">搜索</a>
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
