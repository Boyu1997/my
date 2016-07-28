<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class EmployeeController extends Controller
{
    public function getOverview() {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || $privilege->master_admin==0)
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $employees = \App\Employee::with('user')->get();
        return \View::make('employee.overview', compact('user', 'employee', 'privilege', 'employees'));
    }

    public function getEdit($id) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || $privilege->master_admin==0)
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $the_employee = \App\Employee::where('id', '=', $id)->with('user', 'wage', 'privilege')->first();
        return \View::make('employee.edit', compact('user', 'employee', 'privilege', 'the_employee'));
    }
}
