@extends('layouts.master')


@section('on_sale')
    class="active"
@stop

@section('head')
    <link href="/css/sale/overview.css" type='text/css' rel='stylesheet'>
@stop


@section('content')
    <h1 class="page-header">销售概览</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><strong>新项目</strong></h4>
                    <p> &nbsp; <a href="/sale/create">添加</a></p>
                </div>
                <div class="panel-body">
                    @if(sizeof($new_sales))
                        <table class="tablesorter info_table">
                            <thead>
                                <tr>
                                    <th>顾客名称</th>
                                    <th>区域</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($new_sales as $new_sale)
                                    <tr>
                                        <td>{{ $new_sale->customer->name }}</td>
                                        <td>{{ $new_sale->customer->city.'，'.$new_sale->customer->province }}</td>
                                        <td><a href="/sale/id/{{ $new_sale->id }}">查看</a></td>
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
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><strong>追踪项目</strong></h4>
                </div>
                <div class="panel-body">
                    @if(sizeof($ongoing_sales))
                        <table class="tablesorter info_table">
                            <thead>
                                <tr>
                                    <th>顾客名称</th>
                                    <th>区域</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ongoing_sales as $ongoing_sale)
                                    <tr>
                                        <td>{{ $ongoing_sale->customer->name }}</td>
                                        <td>{{ $ongoing_sale->customer->city.'，'.$ongoing_sale->customer->province }}</td>
                                        <td><a href="/sale/id/{{ $ongoing_sale->id }}">查看</a></td>
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
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><strong>投标与签约</strong></h4>
                </div>
                <div class="panel-body">
                    @if(sizeof($bid_sales))
                        <table class="tablesorter info_table">
                            <thead>
                                <tr>
                                    <th>顾客名称</th>
                                    <th>区域</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bid_sales as $bid_sale)
                                    <tr>
                                        <td>{{ $bid_sale->customer->name }}</td>
                                        <td>{{ $bid_sale->customer->city.'，'.$bid_sale->customer->province }}</td>
                                        <td><a href="/sale/id/{{ $bid_sale->id }}">查看</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="not_found_text">
                            <h3>抱歉...</h3>
                            <p>没有查任何记录。快去发现更多的项目，就会有更多的收获。</p>
                        </div>
                    @endif
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
@stop
