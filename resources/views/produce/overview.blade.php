@extends('layouts.master')


@section('on_produce')
    class="active"
@stop

@section('head')
    <link href="/css/produce/overview.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <h1 class="page-header">Produce Overview</h1>

    <div class="ct-chart ct-golden-section" id="overview_chart"></div>

    <hr>

    <div aria-label="Justified button group" role="group" class="btn-group btn-group-justified">
        @if($privilege->master_admin)
            <a class="btn btn-default" href="/produce/create">Create New Produce Record</a>
        @endif
        <a class="btn btn-default" href="/produce/{{ date('Y') }}/{{ date('n') }}">View Monthly</a>
        <a class="btn btn-default disabled" href="#">Search (Comming Soon)</a>
    </div>


@stop

@section('body')
    <script>
        var data = {
            labels: ['Jan', 'Feb', 'March', 'April', 'May'],
            series: [
                [99, 103, 124, 85, 111]
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
                showLabel: true
            },
            axisY: {
                offset: 80,
                onlyInteger: true,
                labelInterpolationFnc: function(value) {
                    return value + 'piece';
                }
            }
        };
        new Chartist.Line('#overview_chart', data, options);
    </script>
@stop
