@extends('layouts.master')


@section('on_produce')
    class="active"
@stop


@section('content')
    <h1 class="page-header">新记录</h1>

    <form class="form-horizontal" method='POST' action='/stock/create'>
        {!! csrf_field() !!}


        <div class="form-group">
            @foreach($form_inputs as $form_input)
                <label for="{{ $form_input->system_name }}" class ="col-sm-2 control-label">{{ $form_input->lable_name }}</label>
                <div class = "col-sm-10 col-md-9">
                    <input type="{{ $form_input->format }}" class="form-control" name="{{ $form_input->system_name }}" id="{{ $form_input->system_name }}"
                        value="{!! old('{{ $form_input->system_name }}') !!}" {{ $form_input->is_required }}>
                    <div class='error'>{!! $errors->first('{{ $form_input->system_name }}') !!}</div>
                </div>
            @endforeach
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">创建</button>
            </div>
        </div>
    </form>
@stop
