@extends('layouts.master')


@section('on_produce')
    class="active"
@stop

@section('head')
    <link href="/css/libraries/theme.metro-dark.min.css" type='text/css' rel='stylesheet'>
    <link href="/css/produce/monthly.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <h1 class="page-header">Produce</h1>

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
        <a id="calender_nav" class="btn btn-default disabled" href="#">{{ $month }}/{{ $year }}</a>
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
        <table id="monthlyTable" class="tablesorter">

                    <thead>
                        <tr>
                            @foreach($produces[0] as $key => $value)
                                @if($key!='id') <th>{{ $key }}</th>
                                @endif
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produces as $produce)
                            <tr>
                                @foreach($produce as $key => $value)
                                    @if($key!='id') <td>{{ $value }}</td>
                                    @endif
                                @endforeach
                                @if($have_id) <td><a href="/produce/id/{{ $produce->id }}">View</a></td>
                                @endif
                            </tr>
                        @endforeach

                    </tbody>
        </table>
    @else
        <div class="panel panel-default">
            <div class="panel-body">
                <h3>Opps...</h3>
                <p4>No data found, please try another month.</p4>
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
    <script src="/js/libraries/jquery-ui.min.js"></script>
    <script src="/js/libraries/jquery.tablesorter.min.js"></script>
    <script src="/js/libraries/jquery.tablesorter.widgets.min.js"></script>
@stop
