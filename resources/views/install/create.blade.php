@extends('layouts.master')


@section('on_install')
    class="active"
@stop


@section('content')
    <h1 class="page-header">New Recore</h1>

    <form class="form-horizontal" method='POST' action='/install/create'>
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="specification" class ="col-sm-2 control-label">Specification</label>
            <div class = "col-sm-10 col-md-9">
                <textarea type="text" class="form-control" name="specification" id="specification" placeholder="Enter Specification" rows="3"></textarea>
                <div class='error'>{{ $errors->first('specification') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="start_at" class="col-sm-2 control-label">Start At</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" class="form-control" name="start_at" id="start_at" placeholder="Enter Serial Number">
                <div class='error'>{{ $errors->first('start_at') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="end_at" class="col-sm-2 control-label">End At</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" class="form-control" name="end_at" id="end_at" placeholder="YYYY/MM/DD">
                <div class='error'>{{ $errors->first('end_at') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="person_hour" class="col-sm-2 control-label">Person Hour</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" class="form-control" name="person_hour" id="person_hour" placeholder="YYYY/MM/DD">
                <div class='error'>{{ $errors->first('person_hour') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="produce_id" class="col-sm-2 control-label">Product Information</label>
            <div class="col-sm-10 col-md-9">
                <select class = "form-control" name="produce_id" id="produce_id">
                    @foreach($produces_for_dropdown as $produce_id => $produce_serial_number)
                        <option value='{{$produce_id}}'>
                            {{$produce_serial_number}}
                        </option>
                    @endforeach
                </select>
                <div class='error'>{{ $errors->first('produce_id') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="employee_id" class="col-sm-2 control-label">Installed By</label>
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
