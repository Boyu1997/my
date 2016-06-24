@extends('layouts.master')


@section('on_sale')
    class="active"
@stop

@section('head')
    <link href="/css/libraries/theme.metro-dark.min.css" type='text/css' rel='stylesheet'>
    <link href="/css/sale/overview.css" type='text/css' rel='stylesheet'>
@stop


@section('content')
    <h1 class="page-header">销售概览</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><strong>新项目</strong></h4>
                    <p> &nbsp; <a href="/">添加</a></p>
                </div>
                    @if(sizeof($new_sales))
                        <table id="monthlyTable" class="tablesorter">
                            <thead>
                                <tr>
                                    @foreach($new_sales[0] as $key => $value)
                                        @if($key!='id') <th>{{ $key }}</th>
                                        @endif
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($new_sales as $new_sale)
                                    <tr>
                                        @foreach($new_sale as $key => $value)
                                            @if($key!='id') <td>{{ $value }}</td>
                                            @endif
                                        @endforeach
                                        <td><a href="/sale/id/{{ $new_sale->id }}">View</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="not_found_text">
                            <h3>Opps...</h3>
                            <p4>No data found, please try another month.</p4>
                        </div>
                    @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><strong>追踪项目</strong></h4>
                    <p> &nbsp; <a href="/">添加</a></p>
                </div>
                <div class="panel-body">
                    Panel content
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><strong>投标与签约</strong></h4>
                    <p> &nbsp; <a href="/">添加</a></p>
                </div>
                <div class="panel-body">
                    Panel content
                </div>
            </div>
        </div>
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
