@extends('layouts.master')


@section('on_employee')
    class="active"
@stop

@section('head')
    <link href="/css/employee/edit.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="delete_conform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <br>
                    <h4 class="modal-title">删除后记录将无法恢复，您确认要删除吗</h4>
                </div>
                <div class="modal-footer">
                    <form class="form-horizontal" method='POST' action='/employee/delete/id/{{$the_employee->id}}'>
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" value="{{ $the_employee->id }}">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-danger">确认删除</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- HTML -->
    <h1 class="page-header">编辑员工</h1>

    <form class="form-horizontal" method='POST' action='/employee/edit/id/{{$the_employee->id}}'>
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{ $the_employee->id }}">


        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">职位</label>
            <div class = "col-sm-10 col-md-9">
                <input type="text" class="form-control" name="position" id="position" value="{{ $the_employee->position }}" placeholder="请输入职位">
                <div class='error'>{{ $errors->first('position') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">办公邮箱</label>
            <div class = "col-sm-10 col-md-9">
                <input type="text" class="form-control" name="company_email" id="company_email" value="{{ $the_employee->company_email }}" placeholder="请输入办公邮箱">
                <div class='error'>{{ $errors->first('company_email') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">办公手机</label>
            <div class = "col-sm-10 col-md-9">
                <input type="text" class="form-control" name="company_cellphone" id="company_cellphone" value="{{ $the_employee->company_cellphone }}" placeholder="请输入办公手机">
                <div class='error'>{{ $errors->first('company_cellphone') }}</div>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">基础工资</label>
            <div class = "col-md-8">
                <input type="text" class="form-control" name="monthly_base" id="monthly_base" value="{{ $the_employee->wage->monthly_base }}" placeholder="请输入基础工资金额">
                <div class='error'>{{ $errors->first('monthly_base') }}</div>
            </div>
            <label for="model" class ="col-sm-1 control-label wage_unit_label">元/月</label>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">全勤奖励</label>
            <div class = "col-md-8">
                <input type="text" class="form-control" name="attendance_stander" id="attendance_stander" value="{{ $the_employee->wage->attendance_stander }}" placeholder="请输入全勤补助金额">
                <div class='error'>{{ $errors->first('attendance_stander') }}</div>
            </div>
            <label for="model" class ="col-sm-1 control-label wage_unit_label">元/月</label>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">缺勤扣除</label>
            <div class = "col-md-8">
                <input type="text" class="form-control" name="attendance_deduction" id="attendance_deduction" value="{{ $the_employee->wage->attendance_deduction }}" placeholder="请输入缺勤扣除金额">
                <div class='error'>{{ $errors->first('attendance_deduction') }}</div>
            </div>
            <label for="model" class ="col-sm-1 control-label wage_unit_label">元/次</label>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">电话补助</label>
            <div class = "col-md-8">
                <input type="text" class="form-control" name="cellphone_grant" id="cellphone_grant" value="{{ $the_employee->wage->cellphone_grant }}" placeholder="请输入电话补助金额">
                <div class='error'>{{ $errors->first('cellphone_grant') }}</div>
            </div>
            <label for="model" class ="col-sm-1 control-label wage_unit_label">元/月</label>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">饭补</label>
            <div class = "col-md-8">
                <input type="text" class="form-control" name="meal_grant" id="meal_grant" value="{{ $the_employee->wage->meal_grant }}" placeholder="请输入饭补金额">
                <div class='error'>{{ $errors->first('meal_grant') }}</div>
            </div>
            <label for="model" class ="col-sm-1 control-label wage_unit_label">元/月</label>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">工时标准</label>
            <div class = "col-md-8">
                <input type="text" class="form-control" name="person_hour_standard" id="person_hour_standard" value="{{ $the_employee->wage->person_hour_standard }}" placeholder="请输入饭补金额">
                <div class='error'>{{ $errors->first('person_hour_standard') }}</div>
            </div>
            <label for="model" class ="col-sm-1 control-label wage_unit_label">元/天</label>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">出差补助</label>
            <div class = "col-md-8">
                <input type="text" class="form-control" name="trip_allowance_standard" id="trip_allowance_standard" value="{{ $the_employee->wage->trip_allowance_standard }}" placeholder="请输入饭补金额">
                <div class='error'>{{ $errors->first('trip_allowance_standard') }}</div>
            </div>
            <label for="model" class ="col-sm-1 control-label wage_unit_label">元/天</label>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">计件工资</label>
            <div class = "col-md-8">
                <input type="text" class="form-control" name="piece_rate_stander" id="piece_rate_stander" value="{{ $the_employee->wage->piece_rate_stander }}" placeholder="请输入饭补金额">
                <div class='error'>{{ $errors->first('piece_rate_stander') }}</div>
            </div>
            <label for="model" class ="col-sm-1 control-label wage_unit_label">元/件</label>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">计件奖励</label>
            <div class = "col-md-8">
                <input type="text" class="form-control" name="piece_rate_award_stander" id="piece_rate_award_stander" value="{{ $the_employee->wage->piece_rate_award_stander }}" placeholder="请输入饭补金额">
                <div class='error'>{{ $errors->first('piece_rate_award_stander') }}</div>
            </div>
            <label for="model" class ="col-sm-1 control-label wage_unit_label">元/件</label>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">计件奖标准</label>
            <div class = "col-md-8">
                <input type="text" class="form-control" name="piece_rate_award_requirement" id="piece_rate_award_requirement" value="{{ $the_employee->wage->piece_rate_award_requirement }}" placeholder="请输入饭补金额">
                <div class='error'>{{ $errors->first('piece_rate_award_requirement') }}</div>
            </div>
            <label for="model" class ="col-sm-1 control-label wage_unit_label">元/件</label>
        </div>
        <hr>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">管理员权限</label>
            <div class = "col-sm-10 col-md-9">
                <select class = "form-control" name="master_admin" id="master_admin" value="{{ $the_employee->privilege->master_admin }}" placeholder="请输入办公手机">
                    <option value=0 @if(!$the_employee->privilege->master_admin)selected="selected"@endif>否</option>
                    <option value=1 @if($the_employee->privilege->master_admin)selected="selected"@endif>是</option>
                </select>
                <div class='error'>{{ $errors->first('master_admin') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">生产权限</label>
            <div class = "col-sm-10 col-md-9">
                <select class = "form-control" name="produce" id="produce" value="{{ $the_employee->privilege->produce }}" placeholder="请输入办公手机">
                    <option value=0 @if(!$the_employee->privilege->produce)selected="selected"@endif>否</option>
                    <option value=1 @if($the_employee->privilege->produce)selected="selected"@endif>是</option>
                </select>
                <div class='error'>{{ $errors->first('produce') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">安装权限</label>
            <div class = "col-sm-10 col-md-9">
                <select class = "form-control" name="install" id="install" value="{{ $the_employee->privilege->install }}" placeholder="请输入办公手机">
                    <option value=0 @if(!$the_employee->privilege->install)selected="selected"@endif>否</option>
                    <option value=1 @if($the_employee->privilege->install)selected="selected"@endif>是</option>
                </select>
                <div class='error'>{{ $errors->first('maintenance') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">维护权限</label>
            <div class = "col-sm-10 col-md-9">
                <select class = "form-control" name="maintenance" id="maintenance" value="{{ $the_employee->privilege->maintenance }}" placeholder="请输入办公手机">
                    <option value=0 @if(!$the_employee->privilege->maintenance)selected="selected"@endif>否</option>
                    <option value=1 @if($the_employee->privilege->maintenance)selected="selected"@endif>是</option>
                </select>
                <div class='error'>{{ $errors->first('maintenance') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">销售权限</label>
            <div class = "col-sm-10 col-md-9">
                <select class = "form-control" name="sale" id="sale" value="{{ $the_employee->privilege->sale }}" placeholder="请输入办公手机">
                    <option value=0 @if(!$the_employee->privilege->sale)selected="selected"@endif>否</option>
                    <option value=1 @if($the_employee->privilege->sale)selected="selected"@endif>是</option>
                </select>
                <div class='error'>{{ $errors->first('sale') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">合同权限</label>
            <div class = "col-sm-10 col-md-9">
                <select class = "form-control" name="contract" id="contract" value="{{ $the_employee->privilege->contract }}" placeholder="请输入办公手机">
                    <option value=0 @if(!$the_employee->privilege->contract)selected="selected"@endif>否</option>
                    <option value=1 @if($the_employee->privilege->contract)selected="selected"@endif>是</option>
                </select>
                <div class='error'>{{ $errors->first('contract') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">行程权限</label>
            <div class = "col-sm-10 col-md-9">
                <select class = "form-control" name="trip" id="trip" value="{{ $the_employee->privilege->trip }}" placeholder="请输入办公手机">
                    <option value=0 @if(!$the_employee->privilege->trip)selected="selected"@endif>否</option>
                    <option value=1 @if($the_employee->privilege->trip)selected="selected"@endif>是</option>
                </select>
                <div class='error'>{{ $errors->first('trip') }}</div>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">保存变更</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_conform">删除记录</button>
            </div>
        </div>
    </form>
@stop
