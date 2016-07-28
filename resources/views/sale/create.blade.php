@extends('layouts.master')


@section('on_sale')
    class="active"
@stop

@section('head')
    <link href="/css/sale/create.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <h1 class="page-header">新记录</h1>

    <form class="form-horizontal" method='POST' action='/sale/create'>
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
        </div>
        <div class="form-group">
            <label for="specification" class="col-sm-2 control-label">详情</label>
            <div class="col-sm-10 col-md-9">
                <textarea type="text" class="form-control" name="specification" id="specification" value="{{ old('specification') }}" placeholder="请输入详情"></textarea>
                <div class='error'>{{ $errors->first('specification') }}</div>
            </div>
        </div>

        <div class="form-group">
            <label for="specification" class="col-sm-2 control-label">顾客</label>
            <div class="col-sm-10 col-md-9">
                <select class = "form-control" id="nation">
                    @foreach($customers_nation_for_dropdown as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                <select class = "form-control" id="province">
                    <option value='0'>请选择</option>
                </select>
                <select class = "form-control" id="city">
                    <option value='0'>请选择</option>
                </select>
                <select class = "form-control" name="customer_id" id="name">
                    <option value='0'>请选择</option>
                </select>
                <p id="text_after_input">没有您在找的顾客？那就<a href="/sale/customer/create">马上创建顾客</a>吧。</p>
                <div class='error'>{{ $errors->first('employee_id') }}</div>
            </div>
        </div>

        <!-- Large modal -->


        <div class="form-group">
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
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
@stop

@section('body')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#nation").on("change", function() {
                $.get("getCreateNation", {nation: $("#nation").val()}, function(data) {
                    $("#province").html(data);
                });
                $("#city").html("<option value='0'>请选择</option>");
                $("#name").html("<option value='0'>请选择</option>");
            });

            $("#province").on("change", function() {
                $.get("getCreateProvince", {nation: $("#nation").val(), province: $("#province").val()}, function(data) {
                    $("#city").html(data);
                });
                $("#name").html("<option value='0'>请选择</option>");
            });

            $("#city").on("change", function() {
                $.get("getCreateCity", {nation: $("#nation").val(), province: $("#province").val(), city: $("#city").val()}, function(data) {
                    $("#name").html(data);
                });
            });
        });
    </script>
@stop
