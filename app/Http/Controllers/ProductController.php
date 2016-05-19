<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{
    public function getById($id = null) {
        $user = \Auth::user();
        $employee = \App\Employee::where('id', '=', $user->employee_id)->first();
        if($employee->privilege_id)
        {
            $privilege = \App\Privilege::where('id', '=', $employee->privilege_id)->first();
            if($privilege->master_admin)
            {
                $produce_array = \DB::table('produces')->where('id', '=', $id)->select('id', 'model', 'serial_number', 'finished_at', 'sold_at', 'sold_to', 'employee_id', 'install_id')->get();
                $produce = collect($produce_array)->first();
                $produce_user = \DB::table('users')->where('employee_id', '=', $produce->employee_id)->select('last_name', 'first_name')->first();
                $produce->employee_name = $produce_user->last_name.' '.$produce_user->first_name;
                if($produce->install_id)
                {
                    $install_array = \DB::table('installs')->where('id', '=', $produce->install_id)->select('specification', 'start_at', 'end_at', 'person_hour', 'employee_id')->get();
                    $install = collect($install_array)->first();
                    $install_user = \DB::table('users')->where('employee_id', '=', $install->employee_id)->select('last_name', 'first_name')->first();
                    $install->employee_name = $install_user->last_name.' '.$install_user->first_name;
                }
                else $install = null;
            }
        }
        return view('product.byId', compact('produce', 'install'));
    }
}
