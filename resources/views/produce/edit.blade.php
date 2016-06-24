@extends('layouts.master')


@section('on_produce')
    class="active"
@stop


@section('content')
    <h1 class="page-header">编辑记录</h1>

    <form class="form-horizontal" method='POST' action='/produce/edit/id/{{$produce->id}}'>
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{ $produce->id }}">

        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">型号</label>
            <div class = "col-sm-10 col-md-9">
                <input type="text" class="form-control" name="model" id="model" value="{{ $produce->model }}" placeholder="Enter Model">
                <div class='error'>{{ $errors->first('model') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="serial_number" class="col-sm-2 control-label">序列号</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" class="form-control" name="serial_number" id="serial_number" value="{{ $produce->serial_number }}" placeholder="Enter Serial Number">
                <div class='error'>{{ $errors->first('serial_number') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="start_at" class="col-sm-2 control-label">开始时间</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" class="form-control" name="start_at" id="start_at" value="{{ $produce->start_at }}" placeholder="YYYY/MM/DD">
                <div class='error'>{{ $errors->first('start_at') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="finished_at" class="col-sm-2 control-label">结束时间</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" class="form-control" name="finished_at" id="finished_at" value="{{ $produce->finished_at }}" placeholder="YYYY/MM/DD">
                <div class='error'>{{ $errors->first('finished_at') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="employee_name" class="col-sm-2 control-label">生产者</label>
            <div class="col-sm-10 col-md-9">
                <select class = "form-control" name="employee_id" id="employee_id">
                    @foreach($employees_for_dropdown as $employee_id => $employee_name)
                        <option value="{{$employee_id}}" @if($employee_id==$produce->employee_id)selected="selected"@endif>
                            {{$employee_name}}
                        </option>
                    @endforeach
                </select>
                <div class='error'>{{ $errors->first('employee_id') }}</div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">保存变更</button>
            </div>
        </div>
    </form>
@stop
