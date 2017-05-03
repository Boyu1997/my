@extends('layouts.master')

@section('on_produce')
    class="active"
@stop

@section('head')
    <link href="/css/produce/create.css" type='text/css' rel='stylesheet'>
@stop


@section('content')
    <!-- Modal -->
    <div class="modal fade" id="create_stock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <br>
                <form class="form-horizontal">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="stock_id" class="col-sm-2 control-label">零件</label>
                            <div class="col-sm-10 col-md-9">
                                <select class = "form-control" id="stock_category">
                                    <option value='0' required>请选择分类</option>
                                </select>
                                <select class = "form-control" id="stock_id">
                                    <option value='0' required>请选择零件</option>
                                </select>
                                <div class="error stock_id_error"></div>
                            </div>
                            <label for="use_amount" class="col-sm-2 control-label" required>使用数量</label>
                            <div class="col-sm-10 col-md-9">
                                <input type="number" class="form-control" name="use_amount" id="use_amount" value="{{ old('use_amount') }}" placeholder="请输入使用数量">
                                <div class="error use_amount_error"></div>
                                <p class="text_after_input">没有您在找的零件 ？请与库管人员联系或联系网站管理员。</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="button" class="btn btn-primary" id="create_stock_submit">确认</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- HTML -->
    <h1 class="page-header">新记录</h1>

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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_stock">添加零件</button>
            </div>
        <hr>

            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">创建</button>
            </div>
        </div>
    </form>
@stop

@section('js')
  @parent
    <script type="text/javascript">
        function deleteStock() {
            var self = this;
            $.ajax({
                method: "POST",
                url: "postDeleteStock",
                data: {_token: '{{ csrf_token() }}', stock_id: this.value},
                statusCode: {
                    200: function() {
                        $("#create_contact").modal("hide");
                        $(self).parent().remove();
                    },
                }
            });
        }

        $(document).ready(function() {
            $("#stock_category").on("click", function() {
                $("#stock_category").html("<option value='0'>加载中...</option>");
                $.get("ajaxGetCreateStock", function(data) {
                    $("#stock_category").html(data);
                });
                $("#stock_id").html("<option value='0'>请选择零件</option>");
            });

            $("#stock_category").on("change", function() {
                $.get("getCreateStockId", {category: $("#stock_category").val()}, function(data) {
                    $("#stock_id").html(data['select']);
                });
            });

            $("#create_stock_submit").click(function() {
                $.ajax({
                    method: "POST",
                    url: "ajaxPostCreateStock",
                    data: {_token: '{{ csrf_token() }}', stock_id: $("#stock_id").val(), use_amount: $("#use_amount").val()},
                    statusCode: {
                        200: function(data) {
                            $("#stock_table").append(data['context']);
                            $("#stock_button").append(data['button']);
                            $("#create_stock").modal("hide");
                            $(".del_contact_btn").click(function() {
                                deleteContact.call(this);
                            });
                        },
                        422: function(data) {
                            var errors = jQuery.parseJSON(data.responseText);
                            if($(errors.stock_id).length) $("#create_stock .stock_id_error").html(errors.stock_id);
                            else $("#create_stock .error stock_id_error").empty();
                        }
                    }
                });
            });
        });
    </script>
@stop
