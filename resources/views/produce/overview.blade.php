@extends('layouts.master')


@section('on_produce')
    class="active"
@stop

@section('head')
    <link href="/css/produce/overview.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <h1 class="page-header">生产概览</h1>
    @if(!$privilege->master_admin)
        <div class="row">
            <div class="col-md-8">
    @endif
        <div id="overview_chart" class="ct-chart ct-golden-section"></div>
    @if(!$privilege->master_admin)
            </div>
            <div class="col-md-4">
                <div id="last_month_info">
                    @if($recent_monthly_summery[1]>=7)
                        <span id="month_glyphicon_ok" class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        <h2>符合要求！</h2>
                        <p>完成本月任务即可获得奖励！</p>
                    @else
                        <span id="month_glyphicon_redo" class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                        <h2>就差一点...</h2>
                        <p>完成本月任务，下月就能符合奖励要求！</p>
                    @endif
                </div>
                <div>
                    @if($recent_monthly_summery[1]>=7)
                        @if($recent_monthly_summery[2]>=7)
                            <span id="month_glyphicon_ok" class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            <h2>符合要求！</h2>
                            <p>本月共额外获得700元奖励！</p>
                        @else
                            <div id="monthly_pie">
                                <span class="label label-default">{{$recent_monthly_summery[2]}}/7</span>
                                <h2>加油！</h2>
                                <p>完成任务计后件工资增幅至400元/件！</p>
                            </div>
                        @endif
                    @else
                        @if($recent_monthly_summery[2]>=7)
                            <span id="month_glyphicon_ok" class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            <h2>符合要求！</h2>
                            <p>下月继续完成任务就可以获得奖励！</p>
                        @else
                            <div id="monthly_pie">
                                <span class="label label-default">{{$recent_monthly_summery[2]}}/7</span>
                            </div>
                            <div id="this_month_info">
                                <h2>加油！</h2>
                                <p>再生产{{7-$recent_monthly_summery[2]}}件就能完成本月任务！</p>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    @endif



    <hr>

    <div aria-label="Justified button group" role="group" class="btn-group btn-group-justified">
        @if ($employee->privilege_id && ($privilege->master_admin || $privilege->create_produce))
            <a class="btn btn-default" href="/produce/create">Create New Produce Record</a>
        @endif
        <a class="btn btn-default" href="/produce/{{ date('Y') }}/{{ date('m') }}">View Monthly</a>
        @if ($employee->privilege_id && $privilege->master_admin)
            <a class="btn btn-default" href="/produce/search">Search</a>
        @endif
    </div>

@stop

@section('body')
    <script>
        var data = {
            labels:
                {{json_encode($recent_month)}},
            series: [
                {{json_encode($recent_monthly_summery)}}
            ]
        };
        var options = {
            low: 0,
            showPoint: false,
            lineSmooth: Chartist.Interpolation.simple({
                divisor: 3
            }),
            axisX: {
                showGrid: true,
                showLabel: true,
                labelInterpolationFnc: function(value) {
                    return value + '月';
                }
            },
            axisY: {
                offset: 80,
                onlyInteger: true,
                labelInterpolationFnc: function(value) {
                    return value + '台';
                }
            }
        };
        new Chartist.Line('#overview_chart', data, options);
    </script>
    @if(!$privilege->master_admin && $recent_monthly_summery[2]<7)
        <script>
            var data = {
                series: [{{json_encode($recent_monthly_summery[2])}}, 0, 7-{{json_encode($recent_monthly_summery[2])}}]
            };
            var options = {
                donut: true,
                donutWidth: 60,
                startAngle: 270,
                total: 14,
                showLabel: false
            };
            new Chartist.Pie('#monthly_pie', data, options);
        </script>
    @endif
@stop
