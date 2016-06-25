@extends('layouts.master')


@section('on_sale')
    class="active"
@stop

@section('head')
    <link href="/css/sale/byId.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <h1 class="page-header">销售信息</h1>
    <div class="headline">
        <h2>概览</h2>
        <p> &nbsp; <a href="/sale/edit/id/{{$sale->id}}">编辑</a></p>
    </div>
    <table class="table table-bordered">
        @foreach($sale as $key => $value)
            @if(!preg_match('/id/', $key))
                <tr>
                    <th>{{ $key }}</th>
                    <th>{{ $value }}</th>
                </tr>
            @endif
        @endforeach
    </table>
    <br>
    <div class="headline">
        <h2>代理商信息</h2>
        @if(sizeof($agent))
            <p> &nbsp; <a href="/sale/agent/edit/id/{{$agent->id}}">编辑</a></p>
        @endif
    </div>
    @if(sizeof($agent))
        <table class="table table-bordered">
            @foreach($agent as $key => $value)
                @if(!preg_match('/id/', $key))
                    <tr>
                        <th>{{ $key }}</th>
                        <th>{{ $value }}</th>
                    </tr>
                @endif
            @endforeach
        </table>
    @else
        <p>没有找到代理商信息，<a href="/sale/agent/create">马上添加</a>。</p>
    @endif
    <br>
    <div class="headline">
        <h2>配套商信息</h2>
        @if(sizeof($complement))
            <p> &nbsp; <a href="/sale/complement/edit/id/{{$complement->id}}">编辑</a></p>
        @endif
    </div>
    @if(sizeof($complement))
        <table class="table table-bordered">
            @foreach($complement as $key => $value)
                @if(!preg_match('/id/', $key))
                    <tr>
                        <th>{{ $key }}</th>
                        <th>{{ $value }}</th>
                    </tr>
                @endif
            @endforeach
        </table>
    @else
        <p>没有找到配套商信息，<a href="/sale/complement/create">马上添加</a>。</p>
    @endif
    <br>
    <div class="headline">
        <h2>用户信息</h2>
        @if(sizeof($customer))
            <p> &nbsp; <a href="/sale/customer/edit/id/{{$customer->id}}">编辑</a></p>
        @endif
    </div>
    @if(sizeof($customer))
        <table class="table table-bordered">
            @foreach($customer as $key => $value)
                @if(!preg_match('/id/', $key))
                    <tr>
                        <th>{{ $key }}</th>
                        <th>{{ $value }}</th>
                    </tr>
                @endif
            @endforeach
        </table>
    @else
        <p>没有找到医院信息，<a href="/sale/customer/create">马上添加</a>。</p>
    @endif
    <br>
    <div class="headline">
        <h2>其他信息</h2>
        @if(sizeof($other))
            <p> &nbsp; <a href="/sale/other/edit/id/{{$other->id}}">编辑</a></p>
        @endif
    </div>
    @if(sizeof($other))
        <table class="table table-bordered">
            @foreach($other as $key => $value)
                @if(!preg_match('/id/', $key))
                    <tr>
                        <th>{{ $key }}</th>
                        <th>{{ $value }}</th>
                    </tr>
                @endif
            @endforeach
        </table>
    @else
        <p>没有找到其他信息，<a href="/sale/other/create">马上添加</a>。</p>
    @endif
@stop
