@extends('layouts.master')


@section('on_employee')
    class="active"
@stop

@section('head')
    <link href="/css/employee/create.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <h1 class="page-header">创建员工</h1>

    <form class="form-horizontal" method='POST' action='/employee/create'>
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="specification" class="col-sm-2 control-label">用户</label>
            <div class="col-sm-10 col-md-9">
                <select class = "form-control" id="last_name">
                    @foreach($users_last_name_for_dropdown as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                <select class = "form-control" id="first_name">
                    <option value='0'>请选择名字</option>
                </select>
                <select class = "form-control" name="username" id="username">
                    <option value='0'>请选择用户名</option>
                </select>
                <div class='error'>{{ $errors->first('username') }}</div>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">职位</label>
            <div class = "col-sm-10 col-md-9">
                <input type="text" class="form-control" name="position" id="position" value="{{ old('position') }}" placeholder="请输入职位">
                <div class='error'>{{ $errors->first('position') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">办公邮箱</label>
            <div class = "col-sm-10 col-md-9">
                <input type="text" class="form-control" name="company_email" id="company_email" value="{{ old('company_email') }}" placeholder="请输入办公邮箱">
                <div class='error'>{{ $errors->first('company_email') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">办公手机</label>
            <div class = "col-sm-10 col-md-9">
                <input type="text" class="form-control" name="company_cellphone" id="company_cellphone" value="{{ old('company_cellphone') }}" placeholder="请输入办公手机">
                <div class='error'>{{ $errors->first('company_cellphone') }}</div>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">基础工资</label>
            <div class = "col-md-8">
                <input type="text" class="form-control" name="monthly_base" id="monthly_base" value="{{ old('monthly_base') }}" placeholder="请输入基础工资金额">
                <div class='error'>{{ $errors->first('monthly_base') }}</div>
            </div>
            <label for="model" class ="col-sm-1 control-label wage_unit_label">元/月</label>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">全勤奖励</label>
            <div class = "col-md-8">
                <input type="text" class="form-control" name="attendance_stander" id="attendance_stander" value="{{ old('attendance_stander') }}" placeholder="请输入全勤补助金额">
                <div class='error'>{{ $errors->first('attendance_stander') }}</div>
            </div>
            <label for="model" class ="col-sm-1 control-label wage_unit_label">元/月</label>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">缺勤扣除</label>
            <div class = "col-md-8">
                <input type="text" class="form-control" name="attendance_deduction" id="attendance_deduction" value="{{ old('attendance_deduction') }}" placeholder="请输入缺勤扣除金额">
                <div class='error'>{{ $errors->first('attendance_deduction') }}</div>
            </div>
            <label for="model" class ="col-sm-1 control-label wage_unit_label">元/次</label>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">电话补助</label>
            <div class = "col-md-8">
                <input type="text" class="form-control" name="cellphone_grant" id="cellphone_grant" value="{{ old('cellphone_grant') }}" placeholder="请输入电话补助金额">
                <div class='error'>{{ $errors->first('cellphone_grant') }}</div>
            </div>
            <label for="model" class ="col-sm-1 control-label wage_unit_label">元/月</label>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">饭补</label>
            <div class = "col-md-8">
                <input type="text" class="form-control" name="meal_grant" id="meal_grant" value="{{ old('meal_grant') }}" placeholder="请输入饭补金额">
                <div class='error'>{{ $errors->first('meal_grant') }}</div>
            </div>
            <label for="model" class ="col-sm-1 control-label wage_unit_label">元/月</label>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">工时标准</label>
            <div class = "col-md-8">
                <input type="text" class="form-control" name="person_hour_standard" id="person_hour_standard" value="{{ old('person_hour_standard') }}" placeholder="请输入饭补金额">
                <div class='error'>{{ $errors->first('person_hour_standard') }}</div>
            </div>
            <label for="model" class ="col-sm-1 control-label wage_unit_label">元/天</label>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">出差补助</label>
            <div class = "col-md-8">
                <input type="text" class="form-control" name="trip_allowance_standard" id="trip_allowance_standard" value="{{ old('trip_allowance_standard') }}" placeholder="请输入饭补金额">
                <div class='error'>{{ $errors->first('trip_allowance_standard') }}</div>
            </div>
            <label for="model" class ="col-sm-1 control-label wage_unit_label">元/天</label>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">计件工资</label>
            <div class = "col-md-8">
                <input type="text" class="form-control" name="piece_rate_stander" id="piece_rate_stander" value="{{ old('piece_rate_stander') }}" placeholder="请输入饭补金额">
                <div class='error'>{{ $errors->first('piece_rate_stander') }}</div>
            </div>
            <label for="model" class ="col-sm-1 control-label wage_unit_label">元/件</label>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">计件奖励</label>
            <div class = "col-md-8">
                <input type="text" class="form-control" name="piece_rate_award_stander" id="piece_rate_award_stander" value="{{ old('piece_rate_award_stander') }}" placeholder="请输入饭补金额">
                <div class='error'>{{ $errors->first('piece_rate_award_stander') }}</div>
            </div>
            <label for="model" class ="col-sm-1 control-label wage_unit_label">元/件</label>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">计件奖标准</label>
            <div class = "col-md-8">
                <input type="text" class="form-control" name="piece_rate_award_requirement" id="piece_rate_award_requirement" value="{{ old('piece_rate_award_requirement') }}" placeholder="请输入饭补金额">
                <div class='error'>{{ $errors->first('piece_rate_award_requirement') }}</div>
            </div>
            <label for="model" class ="col-sm-1 control-label wage_unit_label">元/件</label>
        </div>
        <hr>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">管理员权限</label>
            <div class = "col-sm-10 col-md-9">
                <select class = "form-control" name="master_admin" id="master_admin" value="{{ old('master_admin') }}" placeholder="请输入办公手机">
                    <option value=0>否</option>
                    <option value=1>是</option>
                </select>
                <div class='error'>{{ $errors->first('master_admin') }}</div>
            </div>
        </div>
        <div class="form-group sub_privilege_div">
            <label for="model" class ="col-sm-2 control-label">库存权限</label>
            <div class = "col-sm-10 col-md-9">
                <select class = "form-control sub_privilege" name="stock" id="stock" value="{{ old('stock') }}">
                    <option value=0>否</option>
                    <option value=1>是</option>
                </select>
                <div class='error'>{{ $errors->first('stock') }}</div>
            </div>
        </div>
        <div class="form-group sub_privilege_div">
            <label for="model" class ="col-sm-2 control-label">生产权限</label>
            <div class = "col-sm-10 col-md-9">
                <select class = "form-control sub_privilege" name="produce" id="produce" value="{{ old('produce') }}">
                    <option value=0>否</option>
                    <option value=1>是</option>
                </select>
                <div class='error'>{{ $errors->first('produce') }}</div>
            </div>
        </div>
        <div class="form-group sub_privilege_div">
            <label for="model" class ="col-sm-2 control-label">安装权限</label>
            <div class = "col-sm-10 col-md-9">
                <select class = "form-control sub_privilege" name="install" id="install" value="{{ old('install') }}">
                    <option value=0>否</option>
                    <option value=1>是</option>
                </select>
                <div class='error'>{{ $errors->first('maintenance') }}</div>
            </div>
        </div>
        <div class="form-group sub_privilege_div">
            <label for="model" class ="col-sm-2 control-label">维护权限</label>
            <div class = "col-sm-10 col-md-9">
                <select class = "form-control sub_privilege" name="maintenance" id="maintenance" value="{{ old('maintenance') }}">
                    <option value=0>否</option>
                    <option value=1>是</option>
                </select>
                <div class='error'>{{ $errors->first('maintenance') }}</div>
            </div>
        </div>
        <div class="form-group sub_privilege_div">
            <label for="model" class ="col-sm-2 control-label">销售权限</label>
            <div class = "col-sm-10 col-md-9">
                <select class = "form-control sub_privilege" name="sale" id="sale" value="{{ old('sale') }}">
                    <option value=0>否</option>
                    <option value=1>是</option>
                </select>
                <div class='error'>{{ $errors->first('sale') }}</div>
            </div>
        </div>
        <div class="form-group sub_privilege_div">
            <label for="model" class ="col-sm-2 control-label">合同权限</label>
            <div class = "col-sm-10 col-md-9">
                <select class = "form-control sub_privilege" name="contract" id="contract" value="{{ old('contract') }}">
                    <option value=0>否</option>
                    <option value=1>是</option>
                </select>
                <div class='error'>{{ $errors->first('contract') }}</div>
            </div>
        </div>
        <div class="form-group sub_privilege_div">
            <label for="model" class ="col-sm-2 control-label">行程权限</label>
            <div class = "col-sm-10 col-md-9">
                <select class = "form-control sub_privilege" name="trip" id="trip" value="{{ old('trip') }}">
                    <option value=0>否</option>
                    <option value=1>是</option>
                </select>
                <div class='error'>{{ $errors->first('trip') }}</div>
            </div>
        </div>

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
            $("#last_name").on("change", function() {
                $.get("getCreateLastName", {last_name: $("#last_name").val()}, function(data) {
                    $("#first_name").html(data);
                });
                $("#username").html("<option value='0'>请选择用户名</option>");
            });

            $("#first_name").on("change", function() {
                $.get("getCreateFirstName", {first_name: $("#first_name").val(), last_name: $("#last_name").val()}, function(data) {
                    $("#username").html(data);
                });
            });
        });

        $("#master_admin").on("change", function() {
            if($("#master_admin").val() == 1) {  // is master_admin
                $(".sub_privilege").attr("disabled", true);
                $(".sub_privilege_div").hide();
            }
            else {  // is not master_admin
                $(".sub_privilege").attr("disabled", false);
                $(".sub_privilege_div").show();
            }
        });
    </script>
@stop
