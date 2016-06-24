<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{
    public function getById($id = null) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || $privilege->master_admin==0)
        {
            \Session::flash('danger', '403 Forbidden');
            return redirect('/');
        }
        else
        {
            $produce_array = \DB::table('produces')->where('id', '=', $id)->select('id', 'model', 'serial_number', 'start_at', 'finished_at', 'employee_id', 'install_id')->get();
            $produce = collect($produce_array)->first();
            $produce_employee = \DB::table('users')->where('employee_id', '=', $produce->employee_id)->select('last_name', 'first_name')->first();
            $produce->employee_name = $produce_employee->last_name.' '.$produce_employee->first_name;
            if($produce->install_id)
            {
                $install_array = \DB::table('installs')->where('id', '=', $produce->install_id)->select('id', 'specification', 'start_at', 'end_at', 'person_hour', 'employee_id')->get();
                $install = collect($install_array)->first();
                $install_employee = \DB::table('users')->where('employee_id', '=', $install->employee_id)->select('last_name', 'first_name')->first();
                $install->employee_name = $install_employee->last_name.' '.$install_employee->first_name;
            }
            else $install = null;
        }
        return view('product.byId', compact('user', 'employee', 'privilege', 'produce', 'install'));
    }
}
