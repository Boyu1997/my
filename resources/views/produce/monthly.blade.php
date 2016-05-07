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
            @else
                "/produce/{{ $year }}/{{ $month-1}}"
            @endif
        >&laquo;</a>
        <a id="calender_nav" class="btn btn-default disabled" href="#">{{ $month }}/{{ $year }}</a>
        <a id="calender_nav_right" class="btn btn-default" href=
            @if($month==12)
                "/produce/{{ $year+1 }}/1"
            @else
                "/produce/{{ $year }}/{{ $month+1}}"
            @endif
        >&raquo;</a>
    </div>

        <table id="monthlyTable" class="tablesorter">

                    <thead>
                        <tr>
                            @foreach($produces[0]->toArraY() as $key => $value)
                                <th>{{ $key }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produces as $produce)
                            <tr>
                                @foreach($produce->toArray() as $key => $value)
                                    @if($key!=$produce->id) <td>{{ $value }}</td>
                                    @endif
                                @endforeach
                                @if($produce->id) <td><a href="/produce/id/{{ $produce->id }}">View</a></td>
                                @endif
                            </tr>
                        @endforeach

                    </tbody>
        </table>

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
