@extends('layouts.master')


@section('on_sale')
    class="active"
@stop

@section('head')
    <link href="/css/sale/createAgent.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="create_contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <br>
                <form class="form-horizontal">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class ="col-sm-2 control-label">姓氏</label>
                            <div class = "col-sm-10 col-md-9">
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="请输入姓氏">
                                <div id="last_name_error" class="error"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class ="col-sm-2 control-label">名字</label>
                            <div class = "col-sm-10 col-md-9">
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="请输入名字">
                                <div id="first_name_error" class="error"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class ="col-sm-2 control-label">职位</label>
                            <div class = "col-sm-10 col-md-9">
                                <input type="text" class="form-control" name="job_title" id="job_title" placeholder="请输入职位">
                                <div id="job_title_error" class="error"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class ="col-sm-2 control-label">邮箱地址</label>
                            <div class = "col-sm-10 col-md-9">
                                <input type="text" class="form-control" name="email" id="email" placeholder="请输入邮箱地址">
                                <div id="email_error" class="error"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class ="col-sm-2 control-label">电话号</label>
                            <div class = "col-sm-10 col-md-9">
                                <input type="text" class="form-control" name="cellphone" id="cellphone" placeholder="请输入手机号">
                                <div id="cellphone_error" class="error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="button" id="create_contact_submit" class="btn btn-primary">添加</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- HTML -->
    <h1 class="page-header">新代理商</h1>

    <form class="form-horizontal" method='POST' action='/sale/agent/create'>
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
                    @foreach($agents_nation_for_dropdown as $key => $value)
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
                <div id="not_in_show_agent_input" style="display: none;">
                    <input type="text" class="form-control" name="nation" id="input_nation" value="{{ old('nation') }}" placeholder="请输入国家" disabled>
                    <input type="text" class="form-control" name="province" id="input_province" value="{{ old('province') }}" placeholder="请输入省份" disabled>
                    <input type="text" class="form-control" name="city" id="input_city" value="{{ old('city') }}" placeholder="请输入城市" disabled>
                </div>
                <div>
                    <div class='error'>{{ $errors->first('nation') }}</div>
                    <div class='error'>{{ $errors->first('province') }}</div>
                    <div class='error'>{{ $errors->first('city') }}</div>
                </div>
                <div class="checkbox">
                    <label><input id="not_in_agents_select" type="checkbox">没有符合的地址选项</label>
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
        <hr>
        <div class="form-group">
            <label for="remark" class ="col-sm-2 control-label">联系人</label>
            <div class = "col-sm-10 col-md-9">
                <div id="contact_info"></div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_contact">添加联系人</button>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">创建</button>
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

            $("#not_in_agents_select").on("change", function() {
                if($("#not_in_agents_select").is(':checked')) {  // checked
                    $("#nation").attr("disabled", true);
                    $("#province").attr("disabled", true);
                    $("#city").attr("disabled", true);
                    $("#input_nation").attr("disabled", false);
                    $("#input_province").attr("disabled", false);
                    $("#input_city").attr("disabled", false);
                    $("#not_in_show_agent_input").show();
                }
                else {  // unchecked
                    $("#nation").attr("disabled", false);
                    $("#province").attr("disabled", false);
                    $("#city").attr("disabled", false);
                    $("#input_nation").attr("disabled", true);
                    $("#input_province").attr("disabled", true);
                    $("#input_city").attr("disabled", true);
                    $("#not_in_show_agent_input").hide();
                }
            });

            $("#create_contact_submit").click(function() {
                $.ajax({
                    method: "POST",
                    url: "postCreateContact",
                    data: {_token: '{{ csrf_token() }}', last_name: $("#last_name").val(), first_name: $("#first_name").val(), job_title: $("#job_title").val(), email: $("#email").val(), cellphone: $("#cellphone").val()},
                    statusCode: {
                        200: function(data) {
                            $("#contact_info").append(data);
                            $("#create_contact").modal("hide");
                        },
                        422: function(data) {
                            var errors = jQuery.parseJSON(data.responseText);
                            if($(errors.last_name).length) $("#last_name_error").html(errors.last_name);
                            else $("#last_name_error").empty();
                            if($(errors.first_name).length) $("#first_name_error").html(errors.first_name);
                            else $("#first_name_error").empty();
                            if($(errors.job_title).length) $("#job_title_error").html(errors.job_title);
                            else $("#job_title_error").empty();
                            if($(errors.email).length) $("#email_error").html(errors.email);
                            else $("#email_error").empty();
                            if($(errors.cellphone).length) $("#cellphone_error").html(errors.cellphone);
                            else $("#cellphone_error").empty();
                        }
                    }
                });
            });
        });
    </script>
@stop
