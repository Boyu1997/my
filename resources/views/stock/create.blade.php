@extends('layouts.master')


@section('on_produce')
    class="active"
@stop


@section('content')
    <h1 class="page-header">新记录</h1>

    <form class="form-horizontal" method='POST' action='/stock/create'>
        {!! csrf_field() !!}


        <div class="form-group">
            <label for="name" class ="col-sm-2 control-label">名称</label>
            <div class = "col-sm-10 col-md-9">
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="请输入名称">
                <div class='error'>{{ $errors->first('name') }}</div>
            </div>

            <label for="category" class ="col-sm-2 control-label">类别</label>
            <div class = "col-sm-10 col-md-9">
                <input type="text" class="form-control" name="category" id="category" value="{{ old('category') }}" placeholder="请输入类别">
                <div class='error'>{{ $errors->first('category') }}</div>
            </div>

            <label for="brand" class ="col-sm-2 control-label">品牌</label>
            <div class = "col-sm-10 col-md-9">
                <input type="text" class="form-control" name="brand" id="brand" value="{{ old('brand') }}" placeholder="请输入品牌">
                <div class='error'>{{ $errors->first('brand') }}</div>
            </div>
            <label for="serial_number" class="col-sm-2 control-label">序列号</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" class="form-control" name="serial_number" id="serial_number" value="{{ old('serial_number') }}" placeholder="请输入序列号">
                <div class='error'>{{ $errors->first('serial_number') }}</div>
            </div>
            <label for="end_at" class="col-sm-2 control-label">购买日期</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" class="form-control" name="purchase_day" id="purchase_day" value="{{ old('purchase_day') }}" placeholder="年年年年/月月/日日">
                <div class='error'>{{ $errors->first('purchase_day') }}</div>
            </div>

            <label for="purchase_amount" class="col-sm-2 control-label">购买数量</label>
            <div class="col-sm-10 col-md-9">
                <input type="number" class="form-control" name="purchase_amount" id="spurchase_amount" value="{{ old('purchase_amount') }}" placeholder="购买数量">
                <div class='error'>{{ $errors->first('purchase_amount') }}</div>
            </div>
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">创建</button>
            </div>
        </div>
    </form>
@stop
