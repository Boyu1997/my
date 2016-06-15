@extends('layouts.master')


@section('on_install')
    class="active"
@stop


@section('content')
    <h1 class="page-header">Search</h1>

    <form class="form-horizontal" method='POST' action='/install/search'>
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="specification" class ="col-sm-2 control-label">Specification</label>
            <div class = "col-sm-10 col-md-9">
                <textarea type="text" class="form-control" name="specification" id="specification" value="{{ old('specification') }}" placeholder="Enter Specification" rows="3"></textarea>
                <div class='error'>{{ $errors->first('specification') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="start_at" class="col-sm-2 control-label">Start At</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" class="form-control" name="start_at" id="start_at" value="{{ old('start_at') }}" placeholder="YYYY/MM/DD">
                <div class='error'>{{ $errors->first('start_at') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="end_at" class="col-sm-2 control-label">End At</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" class="form-control" name="end_at" id="end_at" value="{{ old('end_at') }}" placeholder="YYYY/MM/DD">
                <div class='error'>{{ $errors->first('end_at') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="person_hour" class="col-sm-2 control-label">Person Hour</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" class="form-control" name="person_hour" id="person_hour" value="{{ old('person_hour') }}" placeholder="Enter Person Hour">
                <div class='error'>{{ $errors->first('person_hour') }}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="employee_id" class="col-sm-2 control-label">Installed By</label>
            <div class="col-sm-10 col-md-9">
                <select class = "form-control" name="employee_id" id="employee_id">
                    @foreach($employees_for_dropdown as $employee_id => $employee_name)
                        <option value='{{$employee_id}}' @if($employee_id==old('employee_id'))selected="selected"@endif>
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
