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
    <el-row>
        @if(!$privilege->master_admin && $recent_monthly_summery[2]<7)
            <chartjs-line :datalabel="'Recent Overview'" :labels="{{json_encode($recent_month)}}" :data="[{{json_encode($recent_monthly_summery[2])}}, 0, 7-{{json_encode($recent_monthly_summery[2])}}]"></chartjs-line>
        @else
            <chartjs-line :datalabel="'Recent Overview'" :labels="{{json_encode($recent_month)}}" :data="{{json_encode($recent_monthly_summery)}}"></chartjs-line>
        @endif
    </el-row>
    @if(!$privilege->master_admin)
            </div>
            <div class="col-md-4">
                <div id="last_month_info">
                    <h3>上月任务</h3>
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
                <hr>
                <div id="this_month_info">
                    <h3>本月任务</h3>
                    @if($recent_monthly_summery[1]>=7)
                        @if($recent_monthly_summery[2]>=7)
                            <span id="month_glyphicon_ok" class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            <h2>符合要求！</h2>
                            <h4>已额外获得{{$recent_monthly_summery[2]*$employee->wage->piece_rate_award_stander}}元奖励！</h4>
                            <p>继续生产，计件工资为增幅后的{{$employee->wage->piece_rate_stander+$employee->wage->piece_rate_award_stander}}元/件！</p>
                        @else
                            <div id="monthly_pie"></div>
                            <div class="pie_bottom">
                                <h3><span class="label label-default">{{$recent_monthly_summery[2]}}/7</span></h3>
                                <h2>加油！</h2>
                                <p>完成任务计后件工资增幅至{{$employee->wage->piece_rate_stander+$employee->wage->piece_rate_award_stander}}元/件！</p>
                            </div>
                        @endif
                    @else
                        @if($recent_monthly_summery[2]>=7)
                            <span id="month_glyphicon_ok" class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            <h2>符合要求！</h2>
                            <p>下月继续完成任务就可以获得奖励！</p>
                        @else
                            <div id="monthly_pie"></div>
                            <div class="pie_bottom">
                                <h3><span class="label label-default">{{$recent_monthly_summery[2]}}/7</span></h3>
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
        @if ($privilege->master_admin)
            <a class="btn btn-default" href="/produce/create">新建记录</a>
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

@section('js')
    <script>
        var data = {
            labels:
                ,
            series: [
                
            ]
        };
    </script>
    @if(!$privilege->master_admin && $recent_monthly_summery[2]<7)
        <script>
            var data = {
                series: [{{json_encode($recent_monthly_summery[2])}}, 0, 7-{{json_encode($recent_monthly_summery[2])}}]
            };
        </script>
    @endif
@stop
