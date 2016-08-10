@extends('layouts.master')


@section('head')
    <link href="/css/product/byId.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <h1 class="page-header">产品</h1>
    <div class="headline">
        <h2>生产信息</h2>
        <p> &nbsp; <a href="/produce/edit/id/{{$produce->id}}">编辑</a></p>
    </div>
    <table class="table table-bordered">
        <tr>
            <th class="table_head">型号</th>
            <th>{{ $produce->model }}</th>
        </tr>
        <tr>
            <th class="table_head">序列号</th>
            <th>{{ $produce->serial_number }}</th>
        </tr>
        <tr>
            <th class="table_head">开始时间</th>
            <th>{{ $produce->start_at }}</th>
        </tr>
        <tr>
            <th class="table_head">结束时间</th>
            <th>@if($produce->end_at == null) 未完成 @else {{ $produce->end_at }} @endif</th>
        </tr>
        <tr>
            <th class="table_head">成产者</th>
            <th>{{ $produce->employee->user->last_name.$produce->employee->user->first_name }}</th>
        </tr>
    </table>

    <div class="headline">
        <h2>安装信息</h2>
        @if(sizeof($install))
            <p> &nbsp; <a href="/install/edit/id/{{$install->id}}">编辑</a></p>
        @endif
    </div>

    @if(sizeof($install))
        <table class="table table-bordered">
            <tr>
                <th class="table_head">详情</th>
                <th>{{ $install->specification }}</th>
            </tr>
            <tr>
                <th class="table_head">开始时间</th>
                <th>{{ $install->start_at }}</th>
            </tr>
            <tr>
                <th class="table_head">结束时间</th>
                <th>@if($install->end_at == null) 未完成 @else {{ $install->end_at }} @endif</th>
            </tr>
            <tr>
                <th class="table_head">工时</th>
                <th>{{ $install->person_hour }}</th>
            </tr>
            <tr>
                <th class="table_head">安装者</th>
                <th>{{ $install->employee->user->last_name.$install->employee->user->first_name }}</th>
            </tr>
        </table>
    @else
        <p>No install information found, <a href="/install/create">add a record now</a>.</p>
    @endif


        <p hidden>Maintenance Fild Should Be Here...</p>


    @if(sizeof($contract))
        <table class="table table-bordered">
            <tr>
                <th class="table_head">详情</th>
                <th>{{ $install->specification }}</th>
            </tr>
            <tr>
                <th class="table_head">开始时间</th>
                <th>{{ $install->start_at }}</th>
            </tr>
            <tr>
                <th class="table_head">结束时间</th>
                <th>@if($install->end_at == null) 未完成 @else {{ $install->end_at }} @endif</th>
            </tr>
            <tr>
                <th class="table_head">工时</th>
                <th>{{ $install->person_hour }}</th>
            </tr>
            <tr>
                <th class="table_head">安装者</th>
                <th>{{ $install->employee->user->last_name.$install->employee->user->first_name }}</th>
            </tr>
        </table>
    @else
        <p>没有合同, <a href="/install/create">add a record now</a>.</p>
    @endif

@stop
