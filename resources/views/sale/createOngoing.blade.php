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

                <label for="specification" class="col-sm-2 control-label">详情</label>
                <div class="col-sm-10 col-md-9">
                    <textarea type="text" class="form-control" name="specification" id="specification" value="{{ old('specification') }}" placeholder="请输入详情" disabled></textarea>
                    <div class='error'>{{ $errors->first('specification') }}</div>
                </div>
                <label for="specification" class="col-sm-2 control-label">代理商</label>
                <div class="col-sm-10 col-md-9">
                    <select class = "form-control nation" class="nation" id="agent_nation">
                        @foreach($agents_nation_for_dropdown as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                    <select class = "form-control province" class="province" id="agent_province">
                        <option value='0'>请选择省份</option>
                    </select>
                    <select class = "form-control city" class="city" id="agent_city">
                        <option value='0'>请选择城市</option>
                    </select>
                    <select class = "form-control name" name="agent_id" id="agent_name">
                        <option value='0'>请选择代理商名称</option>
                    </select>
                    <div class='error'>{{ $errors->first('agent_id') }}</div>
                    <p class="text_after_input">没有您在找的代理商？那就<a href="/sale/agent/create">马上创建代理商</a>吧。</p>
                </div>
            </div>
            <div class="form-group">
                <label for="specification" class="col-sm-2 control-label">配套商</label>
                <div class="col-sm-10 col-md-9">
                    <select class = "form-control nation" class="nation" id="complement_nation">
                        @foreach($complements_nation_for_dropdown as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                    <select class = "form-control province" class="province" id="complement_province">
                        <option value='0'>请选择省份</option>
                    </select>
                    <select class = "form-control city" class="city" id="complement_city">
                        <option value='0'>请选择城市</option>
                    </select>
                    <select class = "form-control name" name="complement_id" id="complement_name">
                        <option value='0'>请选择配套商名称</option>
                    </select>
                    <div class='error'>{{ $errors->first('customer_id') }}</div>
                    <p class="text_after_input">没有您在找的配套商？那就<a href="/sale/complement/create">马上创建配套商</a>吧。</p>
                </div>
            </div>
            <div class="form-group">
                <label for="specification" class="col-sm-2 control-label">顾客</label>
                <div class="col-sm-10 col-md-9">
                    <select class = "form-control nation" class="nation" id="customer_nation">
                        @foreach($customers_nation_for_dropdown as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                    <select class = "form-control province" class="province" id="customer_province">
                        <option value='0'>请选择省份</option>
                    </select>
                    <select class = "form-control city" class="city" id="customer_city">
                        <option value='0'>请选择城市</option>
                    </select>
                    <select class = "form-control name" name="customer_id" id="customer_name">
                        <option value='0'>请选择顾客名称</option>
                    </select>
                    <div class='error'>{{ $errors->first('customer_id') }}</div>
                    <p class="text_after_input">没有您在找的顾客？那就<a href="/sale/customer/create">马上创建顾客</a>吧。</p>
                </div>
            </div>
            <div class="form-group">
                <label for="specification" class="col-sm-2 control-label">其他</label>
                <div class="col-sm-10 col-md-9">
                    <div class="checkbox">
                        <label><input id="add_other_select" type="checkbox">添加其他</label>
                    </div>
                    <div id="add_other_input" style="display: none;">
                        <select class = "form-control nation" class="nation" id="other_nation">
                            @foreach($others_nation_for_dropdown as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        <select class = "form-control province" class="province" id="other_province">
                            <option value='0'>请选择省份</option>
                        </select>
                        <select class = "form-control city" class="city" id="other_city">
                            <option value='0'>请选择城市</option>
                        </select>
                        <select class = "form-control name" name="other_id" id="other_name">
                            <option value='0'>请选择其他名称</option>
                        </select>
                        <div class='error'>{{ $errors->first('customer_id') }}</div>
                        <p class="text_after_input">没有您在找的其他？那就<a href="/sale/other/create">马上创建其他</a>吧。</p>
                    </div>
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
                        if($(data['agent']).size()) {
                            $.get("getCreateOngoingAgentNation", {nation: data['agent']['nation']}, function(data) {
                                $("#agent_province").html(data);
                            });
                            $.get("getCreateOngoingAgentProvince", {nation: data['agent']['nation'], province: data['agent']['province']}, function(data) {
                                $("#agent_city").html(data);
                            });
                            $("#agent_city").val(data['agent']['city']);
                            $.get("getCreateOngoingAgentCity", {nation: data['agent']['nation'], province: data['agent']['province'], city: data['agent']['city']}, function(data) {
                                $("#agent_name").html(data);
                            });
                            $("#agent_province").val(data['agent']['province']);
                            $("#agent_nation").val(data['agent']['nation']);
                            $("#agent_name").val(data['agent']['name']);
                        }
                        if($(data['complement']).size()) {
                            $.get("getCreateOngoingComplementNation", {nation: data['complement']['nation']}, function(data) {
                                $("#complement_province").html(data);
                            });
                            $.get("getCreateOngoingComplementProvince", {nation: data['complement']['nation'], province: data['complement']['province']}, function(data) {
                                $("#complement_city").html(data);
                            });
                            $("#complement_city").val(data['complement']['city']);
                            $.get("getCreateOngoingComplementCity", {nation: data['complement']['nation'], province: data['complement']['province'], city: data['complement']['city']}, function(data) {
                                $("#complement_name").html(data);
                            });
                            $("#complement_province").val(data['complement']['province']);
                            $("#complement_nation").val(data['complement']['nation']);
                            $("#complement_name").val(data['complement']['name']);
                        }
                        if($(data['customer']).size()) {
                            $.get("getCreateOngoingCustomerNation", {nation: data['customer']['nation']}, function(data) {
                                $("#customer_province").html(data);
                            });
                            $.get("getCreateOngoingCustomerProvince", {nation: data['customer']['nation'], province: data['customer']['province']}, function(data) {
                                $("#customer_city").html(data);
                            });
                            $("#customer_city").val(data['customer']['city']);
                            $.get("getCreateOngoingCustomerCity", {nation: data['customer']['nation'], province: data['customer']['province'], city: data['customer']['city']}, function(data) {
                                $("#customer_name").html(data);
                            });
                            $("#customer_province").val(data['customer']['province']);
                            $("#customer_nation").val(data['customer']['nation']);
                            $("#customer_name").val(data['customer']['name']);
                        }
                        if($(data['other']).size()) {
                            $("#other_nation").attr("disabled", false);
                            $("#other_province").attr("disabled", false);
                            $("#other_city").attr("disabled", false);
                            $("#other_name").attr("disabled", false);
                            $("#add_other_input").show();
                            $.get("getCreateOngoingotherNation", {nation: data['other']['nation']}, function(data) {
                                $("#other_province").html(data);
                            });
                            $.get("getCreateOngoingOtherProvince", {nation: data['other']['nation'], province: data['other']['province']}, function(data) {
                                $("#other_city").html(data);
                            });
                            $("#other_city").val(data['other']['city']);
                            $.get("getCreateOngoingOtherCity", {nation: data['other']['nation'], province: data['other']['province'], city: data['other']['city']}, function(data) {
                                $("#other_name").html(data);
                            });
                            $("#other_province").val(data['other']['province']);
                            $("#other_nation").val(data['other']['nation']);
                            $("#other_name").val(data['other']['name']);
                        }
                    });
                    $("#classification").attr("disabled", false);
                    $("#specification").attr("disabled", false);
                    $("#sale_info").show();
                }
            });

            //get province, city, and name of agents
            $("#agent_nation").on("change", function() {
                $.get("getCreateOngoingAgentNation", {nation: $("#agent_nation").val()}, function(data) {
                    $("#agent_province").html(data);
                });
                $("#agent_city").html("<option value='0'>请选择城市</option>");
                $("#agent_name").html("<option value='0'>请选择代理商名称</option>");
            });

            $("#agent_province").on("change", function() {
                $.get("getCreateOngoingAgentProvince", {nation: $("#agent_nation").val(), province: $("#agent_province").val()}, function(data) {
                    $("#agent_city").html(data);
                });
                $("#agent_name").html("<option value='0'>请选择代理商名称</option>");
            });

            $("#agent_city").on("change", function() {
                $.get("getCreateOngoingAgentCity", {nation: $("#agent_nation").val(), province: $("#agent_province").val(), city: $("#agent_city").val()}, function(data) {
                    $("#agent_name").html(data);
                });
            });

            //get province, city, and name of complements
            $("#complement_nation").on("change", function() {
                $.get("getCreateOngoingComplementNation", {nation: $("#complement_nation").val()}, function(data) {
                    $("#complement_province").html(data);
                });
                $("#complement_city").html("<option value='0'>请选择城市</option>");
                $("#complement_name").html("<option value='0'>请选择配套商名称</option>");
            });

            $("#complement_province").on("change", function() {
                $.get("getCreateOngoingComplementProvince", {nation: $("#complement_nation").val(), province: $("#complement_province").val()}, function(data) {
                    $("#complement_city").html(data);
                });
                $("#complement_name").html("<option value='0'>请选择配套商名称</option>");
            });

            $("#complement_city").on("change", function() {
                $.get("getCreateOngoingComplementCity", {nation: $("#complement_nation").val(), province: $("#complement_province").val(), city: $("#complement_city").val()}, function(data) {
                    $("#complement_name").html(data);
                });
            });

            //get province, city, and name of customers
            $("#customer_nation").on("change", function() {
                $.get("getCreateOngoingCustomerNation", {nation: $("#customer_nation").val()}, function(data) {
                    $("#customer_province").html(data);
                });
                $("#customer_city").html("<option value='0'>请选择城市</option>");
                $("#customer_name").html("<option value='0'>请选择顾客名称</option>");
            });

            $("#customer_province").on("change", function() {
                $.get("getCreateOngoingCustomerProvince", {nation: $("#customer_nation").val(), province: $("#customer_province").val()}, function(data) {
                    $("#customer_city").html(data);
                });
                $("#customer_name").html("<option value='0'>请选择顾客名称</option>");
            });

            $("#customer_city").on("change", function() {
                $.get("getCreateOngoingCustomerCity", {nation: $("#customer_nation").val(), province: $("#customer_province").val(), city: $("#customer_city").val()}, function(data) {
                    $("#customer_name").html(data);
                });
            });

            //get province, city, and name of others
            $("#other_nation").on("change", function() {
                $.get("getCreateOngoingOtherNation", {nation: $("#other_nation").val()}, function(data) {
                    $("#other_province").html(data);
                });
                $("#other_city").html("<option value='0'>请选择城市</option>");
                $("#other_name").html("<option value='0'>请选择其他名称</option>");
            });

            $("#other_province").on("change", function() {
                $.get("getCreateOngoingOtherProvince", {nation: $("#other_nation").val(), province: $("#other_province").val()}, function(data) {
                    $("#other_city").html(data);
                });
                $("#other_name").html("<option value='0'>请选择其他名称</option>");
            });

            $("#other_city").on("change", function() {
                $.get("getCreateOngoingOtherCity", {nation: $("#other_nation").val(), province: $("#other_province").val(), city: $("#other_city").val()}, function(data) {
                    $("#other_name").html(data);
                });
            });

            $("#add_other_select").on("change", function() {
                if($("#add_other_select").is(':checked')) {  // checked
                    $("#other_nation").attr("disabled", false);
                    $("#other_province").attr("disabled", false);
                    $("#other_city").attr("disabled", false);
                    $("#other_name").attr("disabled", false);
                    $("#add_other_input").show();
                }
                else {  // unchecked
                    $("#other_nation").attr("disabled", true);
                    $("#other_province").attr("disabled", true);
                    $("#other_city").attr("disabled", true);
                    $("#other_name").attr("disabled", true);
                    $("#add_other_input").hide();
                }
            });
        });
    </script>
@stop
