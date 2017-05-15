@extends('layouts.master')

@section('on_produce')
    class="active"
@stop

@section('head')
    {{-- <link href="/css/produce/create.css" type='text/css' rel='stylesheet'> --}}
@stop


@section('content')
    <produce-create></produce-create>
    {{-- <h1 class="page-header">新记录</h1>

    <form class="form-horizontal" method='POST' action='/produce/create'>
        {!! csrf_field() !!}

        <div class="form-group">
            @foreach($form_inputs as $form_input)
                <label for="{{ $form_input->system_name }}" class ="col-sm-2 control-label">{{ $form_input->lable_name }}</label>
                <div class = "col-sm-10 col-md-9">
                    <input type="{{ $form_input->format }}" class="form-control" name="{{ $form_input->system_name }}" id="{{ $form_input->system_name }}"
                        {{ $form_input->others }} value="{!! old('{{ $form_input->system_name }}') !!}">
                    <div class='error'>{!! $errors->first('{{ $form_input->system_name }}') !!}</div>
                </div>
            @endforeach

            <label for="employee_name" class="col-sm-2 control-label">生产者</label>
            <div class="col-sm-10 col-md-9">
                <select class = "form-control" name="employee_id" id="employee_id" @if(!$privilege->master_admin)value="{{$employee->id}}" disabled @endif>
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

        <hr>

            <label for="remark" class ="col-sm-2 control-label">零件</label>
            <div class = "col-sm-10 col-md-9">
                <div class='row'>
                    <div class='col-md-10'>
                        <table class='table table-bordered' id="stock_table">
                        </table>
                    </div>
                    <div class='col-md-2' id="stock_button">
                    </div>
                </div>
                <button id='add-parts' type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_stock">添加零件</button>
            </div>
        <hr>

            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">创建</button>
            </div>
        </div>
    </form>

    <small-modal title="选择零件">
        <drop-down url="/ajax/produce/create/getCreateStock"></drop-down>
    </small-modal> --}}
@stop

@section('js')
@stop
