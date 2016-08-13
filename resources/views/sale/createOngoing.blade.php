@extends('layouts.master')


@section('on_sale')
    class="active"
@stop

@section('head')
    <link href="/css/sale/createOngoing.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <h1 class="page-header">开始追踪</h1>

    <form class="form-horizontal" method='POST' action='/sale/create/ongoing'>
        {!! csrf_field() !!}
        <input type="hidden" name="status" id="status" value="ongoing">

        <div class="form-group">
            <label for="classification" class="col-sm-2 control-label">记录</label>
            <div class="col-sm-10 col-md-9">
                <select class = "form-control" name="sale_id" id="sale_id">
                    @foreach($new_sales_for_dropdown as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                <div class='error'>{{ $errors->first('classification') }}</div>
            </div>
        </div>
        <div id="sale_info" style="display: none;">
            <div class="form-group">
                <label for="classification" class="col-sm-2 control-label">分类</label>
                <div class="col-sm-10 col-md-9">
                    <select class = "form-control" name="classification" id="classification" disabled>
                        <option value=0>请选择</option>
                        <option value="hospital">医院</option>
                    </select>
                    <div class='error'>{{ $errors->first('classification') }}</div>
                </div>
            </div>
            <div class="form-group">
                <label for="specification" class="col-sm-2 control-label">详情</label>
                <div class="col-sm-10 col-md-9">
                    <textarea type="text" class="form-control" name="specification" id="specification" value="{{ old('specification') }}" placeholder="请输入详情" disabled></textarea>
                    <div class='error'>{{ $errors->first('specification') }}</div>
                </div>
            </div>
            <div class="form-group">
                <label for="specification" class="col-sm-2 control-label">顾客</label>
                <div class="col-sm-10 col-md-9">
                    <select class = "form-control nation" id="nation">
                        @foreach($customers_nation_for_dropdown as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                    <select class = "form-control province" id="province">
                        <option value='0'>请选择省份</option>
                    </select>
                    <select class = "form-control city" id="city">
                        <option value='0'>请选择城市</option>
                    </select>
                    <select class = "form-control name" name="customer_id" id="name">
                        <option value='0'>请选择顾客名称</option>
                    </select>
                    <div class='error'>{{ $errors->first('customer_id') }}</div>
                    <p class="text_after_input">没有您在找的顾客？那就<a href="/sale/customer/create">马上创建顾客</a>吧。</p>
                </div>
            </div>
        </div>

        <hr>

        <div class="form-group">
            <label for="expect_model" class="col-sm-2 control-label">预计型号</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" class="form-control" name="expect_model" id="expect_model" value="{{ old('expect_model') }}" placeholder="请输入预计型号"></input>
                <div class='error'>{{ $errors->first('expect_model') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="expect_amount" class="col-sm-2 control-label">预计台数</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" class="form-control" name="expect_amount" id="expect_amount" value="{{ old('expect_amount') }}" placeholder="请输入预计台数"></input>
                <div class='error'>{{ $errors->first('expect_amount') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="expect_price" class="col-sm-2 control-label">预计价格</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" class="form-control" name="expect_price" id="expect_price" value="{{ old('expect_price') }}" placeholder="请输入预计价格"></input>
                <div class='error'>{{ $errors->first('expect_price') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="expect_sold_date" class="col-sm-2 control-label">预计成交</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" class="form-control" name="expect_sold_date" id="expect_sold_date" value="{{ old('expect_sold_date') }}" placeholder="年年年年/月月/日日"></input>
                <div class='error'>{{ $errors->first('expect_sold_date') }}</div>
                <p class="text_after_input">* 预计信息仅做为参考使用，填写后不可修改。</p>
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
            $("#sale_id").on("change", function() {
                if($("#sale_id").val() == 0) {
                    $("#classification").attr("value", 0);
                    $("#specification").html("");
                    $("#classification").attr("disabled", true);
                    $("#specification").attr("disabled", true);
                    $("#sale_info").hide();
                }
                else {
                    $.get("getCreateOngoingSale", {sale_id: $("#sale_id").val()}, function(data) {
                        $("#classification").attr("value", data['classification']);
                        $("#specification").html(data['specification']);
                    });
                    $("#classification").attr("disabled", false);
                    $("#specification").attr("disabled", false);
                    $("#sale_info").show();
                }
            });

        });
    </script>
@stop
