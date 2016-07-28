<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SaleController extends Controller
{
    public function getOverview() {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        if($privilege->master_admin)
        {
            $new_sales = \App\Sale::where('status', '=', 'new')->select('id', 'status', 'customer_id')->with('customer')->get();
            $ongoing_sales = \App\Sale::where('status', '=', 'ongoing')->select('id', 'status', 'customer_id')->with('customer')->get();
            $bid_sales = \App\Sale::where('status', '=', 'bid')->select('id', 'status', 'customer_id')->with('customer')->get();
        }
        else
        {
            $new_sales = \DB::table('sales')->where('employee_id', '=', $employee->id)->where('status', '=', 'new')->select('id', 'customer_id')->get();
            $ongoing_sales = \DB::table('sales')->where('employee_id', '=', $employee->id)->where('status', '=', 'ongoing')->select('id', 'customer_id', 'classification')->get();
            $bid_sales = \DB::table('sales')->where('employee_id', '=', $employee->id)->where('status', '=', 'bid')->select('id', 'customer_id', 'classification')->get();

        }
        return \View::make('sale.overview', compact('user', 'employee', 'privilege', 'new_sales', 'ongoing_sales', 'bid_sales'));
    }

    public function getCreate() {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $employees_for_dropdown = \App\Sale::employeesNameForDropdown();
        $customers_nation_for_dropdown = \App\Sale::customersNationForDropdown();
        return view('sale.create', compact('user', 'employee', 'privilege', 'employees_for_dropdown', 'customers_nation_for_dropdown'));
    }

    public function postCreate(Request $request) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }

        $this->validate($request, [
            'classification' => 'not_in:0',
            'specification' => 'required',
            'customer_id' => 'not_in:0',
            'employee_id' => 'not_in:0'
        ]);
        $data = $request->only('classification', 'specification', 'customer_id', 'employee_id');
        $sale = new \App\Sale();
        $sale->status = 'new';
        foreach ($data as $key => $value) {
            $sale->$key = $value;
        }
        $sale->save();
        \Session::flash('success', '成功创建了新的销售记录。');
        return redirect('/sale');


        $employees_for_dropdown = \App\Sale::employeesNameForDropdown();
        return view('sale.create', compact('user', 'employee', 'privilege', 'employees_for_dropdown'));
    }

    public function getCreateCustomer() {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $employees_for_dropdown = \App\Sale::employeesNameForDropdown();
        $customers_nation_for_dropdown = \App\Sale::customersNationForDropdown();
        return view('sale.createCustomer', compact('user', 'employee', 'privilege', 'employees_for_dropdown', 'customers_nation_for_dropdown'));
    }

    public function postCreateCustomer(Request $request) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $this->validate($request, [
            'name' => 'required',
            'nation' => 'not_in:0',
            'province' => 'not_in:0',
            'city' => 'not_in:0',
            'address' => 'required',
            'phone_number' => 'integer',
            'fax' => 'integer',
            'remark' => 'required'
        ]);
        $data = $request->only('name', 'nation', 'province', 'city', 'address', 'phone_number', 'fax', 'remark');
        $customer = \App\Customer::create($data);
        \Session::flash('success', '成功添加了新的顾客信息。');
        return redirect('/sale');
    }

    public function getById($id = null) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $sale_array = \DB::table('sales')->where('id', '=', $id)->select('id', 'status', 'classification', 'specification', 'expect_model', 'expect_amount', 'expect_price', 'expect_sold_date',
            'bid_date', 'result', 'winning_company', 'sold_model', 'sold_amount', 'sold_price', 'agent_id', 'complement_id', 'customer_id', 'other_id', 'employee_id')->get();
        $sale = collect($sale_array)->first();
        if($privilege->master_admin==0 && $sale->employee_id!=$employee->id)
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $sale_employee = \DB::table('users')->where('employee_id', '=', $sale->employee_id)->select('last_name', 'first_name')->first();
        $sale->employee_name = $sale_employee->last_name.' '.$sale_employee->first_name;
        if($sale->agent_id)
        {
            $agent_array = \DB::table('agents')->where('id', '=', $sale->agent_id)->select('id', 'name', 'nation', 'province', 'city', 'address', 'phone_number', 'fax', 'remark')->get();
            $agent = collect($agent_array)->first();
            //agent's contact info need to add to $agent object.
        }
        else $agent = null;
        if($sale->complement_id)
        {
            $complement_array = \DB::table('complements')->where('id', '=', $sale->complement_id)->select('id', 'name', 'nation', 'province', 'city', 'address', 'phone_number', 'fax', 'remark')->get();
            $complement = collect($complement_array)->first();
            //agent's contact info need to add to $agent object.
        }
        else $complement = null;
        if($sale->customer_id)
        {
            $customer_array = \DB::table('customers')->where('id', '=', $sale->customer_id)->select('id', 'name', 'nation', 'province', 'city', 'address', 'phone_number', 'fax', 'remark')->get();
            $customer = collect($customer_array)->first();
            //agent's contact info need to add to $agent object.
        }
        else $hospital = null;
        if($sale->other_id)
        {
            $other_array = \DB::table('others')->where('id', '=', $sale->other_id)->select('id', 'name', 'nation', 'province', 'city', 'address', 'phone_number', 'fax', 'remark')->get();
            $other = collect($other_array)->first();
            //agent's contact info need to add to $agent object.
        }
        else $other = null;
        return view('sale.byId', compact('user', 'employee', 'privilege', 'sale', 'agent', 'complement', 'customer', 'other'));
    }

    public function getCreateNation() {
        if(\Request::ajax()) {
            $customers = \App\Customer::where('nation', '=', $_GET["nation"])->get();
            $data = "<option value='0'>请选择省份</option>";
            foreach ($customers as $customer) {
                $data = $data.'<option value="'.$customer->province.'">'.$customer->province.'</option>';
            }
            $data = $data."</select>";
            return $data;
        }
    }

    public function getCreateProvince() {
        if(\Request::ajax()) {
            $customers = \App\Customer::where('nation', '=', $_GET["nation"])->where('province', '=', $_GET["province"])->get();
            $data = "<option value='0'>请选择城市</option>";
            foreach ($customers as $customer) {
                $data = $data.'<option value="'.$customer->city.'">'.$customer->city.'</option>';
            }
            $data = $data."</select>";
            return $data;
        }
    }

    public function getCreateCity() {
        if(\Request::ajax()) {
            $customers = \App\Customer::where('nation', '=', $_GET["nation"])->where('province', '=', $_GET["province"])->where('city', '=', $_GET["city"])->get();
            $data = "<option value='0'>请选择顾客名称</option>";
            foreach ($customers as $customer) {
                $data = $data.'<option value="'.$customer->id.'">'.$customer->name.'</option>';
            }
            $data = $data."</select>";
            return $data;
        }
    }
}
