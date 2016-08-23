@extends('layouts.master')


@section('on_sale')
    class="active"
@stop

@section('head')
    <link href="/css/sale/byId.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="add_agent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <br>
                <form class="form-horizontal">
                    <div class="modal-body">
                        <div class="form-group">
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
                                <select class = "form-control name" name="agent_id" class="name">
                                    <option value='0'>请选择代理商名称</option>
                                </select>
                                <div class='error'>{{ $errors->first('agent_id') }}</div>
                                <p class="text_after_input">没有您在找的代理商？那就<a href="/sale/agent/create">马上创建代理商</a>吧。</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="button" id="add_agent_submit" class="btn btn-primary">添加</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- HTML -->
    <h1 class="page-header">销售信息</h1>
    <div class="headline">
        <h2>概览</h2>
        <p> &nbsp; <a href="/sale/edit/id/{{$sale->id}}">编辑</a></p>
    </div>
    @if($sale->status == "new")
        <table class="table table-bordered">
            <tr>
                <th class="table_head">状态</th>
                <th>新项目</th>
            </tr>
            <tr>
                <th class="table_head">分类</th>
                <th>{{ $sale->classification }}</th>
            </tr>
            <tr>
                <th class="table_head">详情</th>
                <th>{{ $sale->specification }}</th>
            </tr>
        </table>
    @elseif($sale->status == "ongoing")
        <table class="table table-bordered">
            <tr>
                <th class="table_head">状态</th>
                <th>正在进行</th>
            </tr>
        </table>
    @elseif($sale->status == "bid")
        <table class="table table-bordered">
            <tr>
                <th class="table_head">状态</th>
                <th>投标中</th>
            </tr>
        </table>
    @elseif($sale->status == "success")
        <table class="table table-bordered">
            <tr>
                <th class="table_head">状态</th>
                <th>成功</th>
            </tr>
        </table>
    @elseif($sale->status == "finished")
        <table class="table table-bordered">
            <tr>
                <th class="table_head">状态</th>
                <th>已完成</th>
            </tr>
        </table>
    @elseif($sale->status == "ended")
        <table class="table table-bordered">
            <tr>
                <th class="table_head">状态</th>
                <th>已结束</th>
            </tr>
        </table>
    @endif
    <br>
    <div class="headline">
        <h2>代理商信息</h2>
        @if(sizeof($sale->agent))
            <p> &nbsp; <a href="/sale/agent/edit/id/{{$sale->agent->id}}">编辑</a></p>
        @endif
    </div>
    @if(sizeof($sale->agent))
        <table class="table table-bordered">
            <tr>
                <th class="table_head">名称</th>
                <th class="table_head">{{ $sale->agent->name }}</th>
            </tr>
        </table>
    @else
        <p>没有找到代理商信息，<a href="#" data-toggle="modal" data-target="#add_agent">马上添加</a>。</p>
    @endif
    <br>
    <div class="headline">
        <h2>配套商信息</h2>
        @if(sizeof($sale->complement))
            <p> &nbsp; <a href="/sale/complement/edit/id/{{$sale->complement->id}}">编辑</a></p>
        @endif
    </div>
    @if(sizeof($sale->complement))

    @else
        <p>没有找到配套商信息，<a href="/sale/complement/create">马上添加</a>。</p>
    @endif
    <br>
    <div class="headline">
        <h2>用户信息</h2>
        @if(sizeof($sale->customer))
            <p> &nbsp; <a href="/sale/customer/edit/id/{{$sale->customer->id}}">编辑</a></p>
        @endif
    </div>
    @if(sizeof($sale->customer))
        <table class="table table-bordered">
            <tr>
                <th class="table_head">名称</th>
                <th>{{ $sale->customer->name }}</th>
            </tr>
            <tr>
                <th class="table_head">地址</th>
                <th>{{ $sale->customer->nation."，".$sale->customer->province."，".$sale->customer->city."，".$sale->customer->address }}</th>
            </tr>
            <tr>
                <th class="table_head">电话号</th>
                <th>{{ $sale->customer->phone_number }}</th>
            </tr>
            <tr>
                <th class="table_head">传真</th>
                <th>{{ $sale->customer->fax }}</th>
            </tr>
            <tr>
                <th class="table_head">备注</th>
                <th>{{ $sale->customer->remark }}</th>
            </tr>
            @if(sizeof($sale->customer->contacts))
                @foreach($sale->customer->contacts as $order => $contact)
                    <tr>
                        <th class="table_head">联系人{{ $order+1 }} 姓名</th>
                        <th>{{ $contact->last_name.$contact->first_name }}</th>
                    </tr>
                    <tr>
                        <th class="table_head">联系人{{ $order+1 }} 职位</th>
                        <th>{{ $contact->job_title }}</th>
                    </tr>
                    <tr>
                        <th class="table_head">联系人{{ $order+1 }} 邮箱</th>
                        <th>{{ $contact->email }}</th>
                    </tr>
                    <tr>
                        <th class="table_head">联系人{{ $order+1 }} 电话</th>
                        <th>{{ $contact->cellphone }}</th>
                    </tr>
                @endforeach
            @else
                <tr>
                    <th class="table_head">联系人</th>
                    <th>无</th>
                </tr>
            @endif
        </table>
    @else
        <p>没有找到医院信息，<a href="/sale/customer/create">马上添加</a>。</p>
    @endif
    <br>
    <div class="headline">
        <h2>其他信息</h2>
        @if(sizeof($sale->other))
            <p> &nbsp; <a href="/sale/other/edit/id/{{$sale->other->id}}">编辑</a></p>
        @endif
    </div>
    @if(sizeof($sale->other))

    @else
        <p>没有找到其他信息，<a href="/sale/other/create">马上添加</a>。</p>
    @endif
@stop
