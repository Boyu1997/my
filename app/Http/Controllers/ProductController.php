<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{
    public function getById($id = null)
    {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if (sizeof($privilege)==0 || $privilege->master_admin==0) {
            \Session::flash('danger', '403 Forbidden');
            return redirect('/');
        } else {
            $produce = \App\Produce::where('id', '=', $id)->with('employee.user')->select('id', 'model', 'serial_number', 'start_at', 'end_at', 'employee_id', 'install_id')->first();
            if ($produce->install_id) {
                $install = \App\Install::where('id', '=', $produce->install_id)->with('employee.user')->select('id', 'specification', 'start_at', 'end_at', 'person_hour', 'employee_id')->first();
            } else {
                $install = null;
            }
            if ($produce->contract_id) {
                $contract = \App\Contract::where('id', '=', $produce->contract_id)->select('id', 'specification', 'start_at', 'end_at', 'person_hour', 'employee_id')->first();
            } else {
                $install = null;
            }

            $contract = null;
        }
        return view('product.byId', compact('user', 'employee', 'privilege', 'produce', 'install', 'contract'));
    }
}
