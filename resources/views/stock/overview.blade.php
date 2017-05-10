@extends('layouts.master')


@section('on_stock')
    class="active"
@stop

@section('head')
    <link href="/css/stock/overview.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <div>
        <h1>库存概览</h1>
        <div>
            <el-button type="text" icon="document">新建记录</el-button>
            <el-button type="text" icon="date">按月查看</el-button>
            <el-button type="text" icon="check">正在生产</el-button>
            <el-button type="text" icon="search">搜索</el-button>
        </div>
        <overview-table url='/ajax/stock/getInfo'></overview-table>
    </div>
@stop

@section('js')
    <script src="/js/stockOverview.js" charset="utf-8"></script>
@stop
