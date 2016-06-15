@extends('layouts.master')


@section('on_produce')
    class="active"
@stop

@section('head')
    <link href="/css/libraries/theme.metro-dark.min.css" type='text/css' rel='stylesheet'>
    <link href="/css/produce/searchResult.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <h1 class="page-header">Search</h1>

    <div aria-label="Justified button group" role="group" class="btn-group btn-group-justified">
        <a id="search_nav" class="btn btn-default disabled" href="#">Search Result</a>
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
                                <td><a href="/product/id/{{ $produce->id }}">View</a></td>
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
