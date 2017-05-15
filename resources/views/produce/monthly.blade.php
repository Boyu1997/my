@extends('layouts.master')

@section('head')
    {{-- <link href="/css/produce/monthly.css" type='text/css' rel='stylesheet'> --}}
@stop

@section('main')
    <h1 class="page-header">按月查看</h1>

    <div aria-label="Justified button group" role="group" class="btn-group btn-group-justified">
        <a id="calender_nav_left" class="btn btn-default" href=
            @if($month==1)
                "/produce/{{ $year-1 }}/12"
            @elseif($month<=10)
                "/produce/{{ $year }}/0{{ $month-1}}"
            @else
                "/produce/{{ $year }}/{{ $month-1}}"
            @endif
        >&laquo;</a>
        <a id="calender_nav" class="btn btn-default disabled" href="#">{{ $year }}/{{ $month }}</a>
        <a id="calender_nav_right" class="btn btn-default" href=
            @if($month==12)
                "/produce/{{ $year+1 }}/01"
            @elseif($month<9)
                "/produce/{{ $year }}/0{{ $month+1}}"
            @else
                "/produce/{{ $year }}/{{ $month+1}}"
            @endif
        >&raquo;</a>
    </div>
    @if(sizeof($produces))
        <table id="monthly_table" class="tablesorter">
            <thead>
                <tr>
                    <th>型号</th>
                    <th>序列号</th>
                    <th>结束时间</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produces as $produce)
                    <tr>
                        <td>{{ $produce->model }}</td>
                        <td>{{ $produce->serial_number }}</td>
                        <td>{{ $produce->end_at }}</td>
                        @if($have_id) <td><a href="/product/id/{{ $produce->id }}">查看</a></td> @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="panel panel-default">
            <div class="panel-body">
                <h3>抱歉...</h3>
                <p4>没有找到任何数据，换一个月试试。</p4>
            </div>
        </div>
    @endif

    </div>

@stop

@section('js')
@stop
