@extends('layouts.master')


@section('on_sale')
    class="active"
@stop

@section('head')
    <link href="/css/sale/inputForm.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <h1 class="page-header">新记录</h1>

    <form class="form-horizontal" method='POST' action='/sale/create/new'>
        {!! csrf_field() !!}
        <input type="hidden" name="status" id="status" value="new">

        <div class="form-group">
            <label for="classification" class="col-sm-2 control-label">分类</label>
            <div class="col-sm-10 col-md-9">
                <select class = "form-control" name="classification" id="classification">
                    <option value=0>请选择</option>
                    <option value="hospital">医院</option>
                </select>
                <div class='error'>{{ $errors->first('classification') }}</div>
            </div>

            <label for="specification" class="col-sm-2 control-label">详情</label>
            <div class="col-sm-10 col-md-9">
                <textarea type="text" class="form-control" name="specification" id="specification" value="{{ old('specification') }}" placeholder="请输入详情"></textarea>
                <div class='error'>{{ $errors->first('specification') }}</div>
            </div>
            <label for="specification" class="col-sm-2 control-label">顾客</label>
            <div class="col-sm-10 col-md-9">
                <select class = "form-control" id="nation">
                    <option value='0'>请选择国家</option>
                </select>
                <select class = "form-control" id="province">
                    <option value='0'>请选择省份</option>
                </select>
                <select class = "form-control" id="city">
                    <option value='0'>请选择城市</option>
                </select>
                <select class = "form-control" name="customer_id" id="name">
                    <option value='0'>请选择顾客名称</option>
                </select>
                <div class='error'>{{ $errors->first('customer_id') }}</div>
                <p id="text_after_input">没有您在找的顾客？那就<a href="/sale/customer/create" target="_blank">马上创建顾客</a>吧。</p>
            </div>
            <label for="employee_name" class="col-sm-2 control-label">销售员</label>
            <div class="col-sm-10 col-md-9">
                <select class = "form-control" name="employee_id" id="employee_id" @if(!$privilege->master_admin)value="{{$employee->id}}" readonly @endif>
                    @foreach($employees_for_dropdown as $employee_id => $employee_name)
                        <option value="{{$employee_id}}"
                            @if(!$privilege->master_admin && $employee_id==$employee->id)selected="selected"
                            @elseif($employee_id==old('employee_id'))selected="selected"
                            @endif>
                            {{$employee_name}}
                        </option>
                    @endforeach
                </select>
                <div class='error'>{{ $errors->first('employee_id') }}</div>
            </div>
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
@stop

@section('body')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#nation").on("click", function() {
                $("#nation").html("<option value='0'>加载中...</option>");
                $.get("getCreateNewNation", function(data) {
                    $("#nation").html(data);
                });
                $("#province").html("<option value='0'>请选择省份</option>");
                $("#city").html("<option value='0'>请选择城市</option>");
                $("#name").html("<option value='0'>请选择顾客名称</option>");
            });

            $("#nation").on("change", function() {
                $.get("getCreateNewProvince", {nation: $("#nation").val()}, function(data) {
                    $("#province").html(data);
                });
                $("#city").html("<option value='0'>请选择城市</option>");
                $("#name").html("<option value='0'>请选择顾客名称</option>");
            });

            $("#province").on("change", function() {
                $.get("getCreateNewCity", {nation: $("#nation").val(), province: $("#province").val()}, function(data) {
                    $("#city").html(data);
                });
                $("#name").html("<option value='0'>请选择顾客名称</option>");
            });

            $("#city").on("change", function() {
                $.get("getCreateNewName", {nation: $("#nation").val(), province: $("#province").val(), city: $("#city").val()}, function(data) {
                    $("#name").html(data);
                });
            });

            $("#text_after_input a").on("click", function() {
                $("#nation").html("<option value='0'>请选择国家</option>");
                $("#province").html("<option value='0'>请选择省份</option>");
                $("#city").html("<option value='0'>请选择城市</option>");
                $("#name").html("<option value='0'>请选择顾客名称</option>");
            });
        });
    </script>
@stop
