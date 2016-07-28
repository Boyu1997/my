@extends('layouts.master')


@section('on_employee')
    class="active"
@stop

@section('head')
    <link href="/css/employee/overview.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <h1 class="page-header">员工概览</h1>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><strong>员工信息</strong></h4>
            <p> &nbsp; <a href="/sale/create">添加</a></p>
        </div>
        <div class="panel-body">
            @if(sizeof($employees))
                <table id="info_table" class="tablesorter">
                    <thead>
                        <tr>
                            <th>姓名</th>
                            <th>职位</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->user->last_name.' '.$employee->user->first_name }}</td>
                                <td>{{ $employee->position }}</td>
                                <td><a href="/employee/edit/id/{{ $employee->id }}">查看</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="not_found_text">
                    <h3>抱歉...</h3>
                    <p4>没有查任何记录。连没有员工还能干啥，快去招聘吧！</p4>
                </div>
            @endif
        </div>
    </div>

    <hr>

    <div aria-label="Justified button group" role="group" class="btn-group btn-group-justified">
        <a class="btn btn-default" href="/produce/{{ date('Y') }}/{{ date('m') }}">按月查看</a>
        <a class="btn btn-default" href="/produce/search">搜索</a>
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
