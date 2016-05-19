@extends('layouts.master')


@section('on_produce')
    class="active"
@stop


@section('content')
    <h1 class="page-header">Edit Recore</h1>

    <form class="form-horizontal" method='POST' action='/produce/create'>
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="model" class ="col-sm-2 control-label">Model</label>
            <div class = "col-sm-10 col-md-9">
                <input type="text" class="form-control" name="model" id="model" placeholder="Enter Model">
                <div class='error'>{{ $errors->first('model') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="serial_number" class="col-sm-2 control-label">Serial Number</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" class="form-control" name="serial_number" id="serial_number" placeholder="Enter Serial Number">
                <div class='error'>{{ $errors->first('serial_number') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="finished_at" class="col-sm-2 control-label">Finished At</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" class="form-control" name="finished_at" id="finished_at" placeholder="YYYY/MM/DD">
                <div class='error'>{{ $errors->first('finished_at') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="sold_at" class="col-sm-2 control-label">Sold At</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" class="form-control" name="sold_at" id="sold_at" placeholder="YYYY/MM/DD">
                <div class='error'>{{ $errors->first('sold_at') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="sold_to" class="col-sm-2 control-label">Sold To</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" class="form-control" name="sold_to" id="sold_to" placeholder="Enter Sold To">
                <div class='error'>{{ $errors->first('sold_to') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="employee_name" class="col-sm-2 control-label">Produced By</label>
            <div class="col-sm-10 col-md-9">
                <select class = "form-control" name="employee_id" id="employee_id">
                    @foreach($employees_for_dropdown as $employee_id => $employee_name)
                        <option value='{{$employee_id}}'>
                            {{$employee_name}}
                        </option>
                    @endforeach
                </select>
                <div class='error'>{{ $errors->first('employee_id') }}</div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    </form>
@stop
