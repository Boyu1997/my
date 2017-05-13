@extends('layouts.master')


@section('on_stock')
    class="active"
@stop

@section('head')
    <link href="/css/stock/overview.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <el-row>
    <h1>库存概览</h1>
    </el-row>
    <el-row>
        <el-button type="text" icon="document">新建记录</el-button>
        <el-button type="text" icon="date">按月查看</el-button>
        <el-button type="text" icon="check">正在生产</el-button>
        <el-button type="text" icon="search">搜索</el-button>
    </el-row>
    <el-row>
        <overview-table url="/ajax/stock/overview"></overview-table>
    </el-row>
@stop

@section('head')
@stop
