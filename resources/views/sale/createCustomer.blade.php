@extends('layouts.master')


@section('on_sale')
    class="active"
@stop

@section('head')
    <link href="/css/sale/createCustomer.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <h1 class="page-header">新顾客</h1>

    <form class="form-horizontal" method='POST' action='/sale/customer/create'>
        {!! csrf_field() !!}


        <div class="form-group">
            <label for="name" class ="col-sm-2 control-label">名称</label>
            <div class = "col-sm-10 col-md-9">
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="请输入顾客名称">
                <div class='error'>{{ $errors->first('name') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="specification" class="col-sm-2 control-label">顾客</label>
            <div class="col-sm-10 col-md-9">
                <select class = "form-control" name="nation" id="nation">
                    @foreach($customers_nation_for_dropdown as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                <select class = "form-control" name="province" id="province">
                    <option value='0'>请选择省份</option>
                </select>
                <select class = "form-control" name="city" id="city">
                    <option value='0'>请选择城市</option>
                </select>
                <div class='error'>{{ $errors->first('employee_id') }}</div>
                <div id="not_in_show_input" style="display: none;">
                    <input type="text" class="form-control" name="nation" id="input_nation" value="{{ old('nation') }}" placeholder="请输入国家">
                    <input type="text" class="form-control" name="province" id="input_province" value="{{ old('province') }}" placeholder="请输入省份">
                    <input type="text" class="form-control" name="city" id="input_city" value="{{ old('city') }}" placeholder="请输入城市">
                </div>
                <div>
                    <div class='error'>{{ $errors->first('nation') }}</div>
                    <div class='error'>{{ $errors->first('province') }}</div>
                    <div class='error'>{{ $errors->first('city') }}</div>
                </div>
                <div class="checkbox">
                    <label><input id="not_in_select" type="checkbox">没有符合顾客信息的选项</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="address" class ="col-sm-2 control-label">地址</label>
            <div class = "col-sm-10 col-md-9">
                <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}" placeholder="请输入顾客地址">
                <div class='error'>{{ $errors->first('address') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="phone_number" class ="col-sm-2 control-label">电话</label>
            <div class = "col-sm-10 col-md-9">
                <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" placeholder="请输入顾客电话">
                <div class='error'>{{ $errors->first('phone_number') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="fax" class ="col-sm-2 control-label">传真</label>
            <div class = "col-sm-10 col-md-9">
                <input type="text" class="form-control" name="fax" id="fax" value="{{ old('fax') }}" placeholder="请输入顾客传真">
                <div class='error'>{{ $errors->first('fax') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="remark" class ="col-sm-2 control-label">备注</label>
            <div class = "col-sm-10 col-md-9">
                <input type="text" class="form-control" name="remark" id="remark" value="{{ old('remark') }}" placeholder="请输入备注">
                <div class='error'>{{ $errors->first('remark') }}</div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
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
                $("#city").html("<option value='0'>请选择城市</option>");
                $("#name").html("<option value='0'>请选择名称</option>");
            });

            $("#province").on("change", function() {
                $.get("getCreateProvince", {nation: $("#nation").val(), province: $("#province").val()}, function(data) {
                    $("#city").html(data);
                });
                $("#name").html("<option value='0'>请选择名称</option>");
            });

            $("#not_in_select").on("change", function() {
                if($("#not_in_select").is(':checked')) {  // checked
                    $("#nation").attr("disabled", true);
                    $("#province").attr("disabled", true);
                    $("#city").attr("disabled", true);
                    $("#not_in_show_input").show();
                }
                else {  // unchecked
                    $("#nation").attr("disabled", false);
                    $("#province").attr("disabled", false);
                    $("#city").attr("disabled", false);
                    $("#not_in_show_input").hide();
                }
            });
        });
    </script>
@stop
