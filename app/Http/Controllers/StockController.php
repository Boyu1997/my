<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class StockController extends Controller
{
    public function getOverview()
    {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if (sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->stock==0)) {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $current_stocks = \App\Stock::get();
        return view('stock.overview', compact('user', 'employee', 'privilege', 'current_stocks'));
    }



    // create router
    public function getCreate(Request $request)
    {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if (sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->produce==0)) {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }

        # input form data
        $form_inputs = (object)array(
            (object)array("system_name"=>"name", "label_name"=>"名称", "format"=>"text", "is_required"=>"required"),
            (object)array("system_name"=>"category", "label_name"=>"类型", "format"=>"text", "is_required"=>"required"),
            (object)array("system_name"=>"brand", "label_name"=>"品牌", "format"=>"text", "is_required"=>"required"),
            (object)array("system_name"=>"arriving_date", "label_name"=>"到货时间", "format"=>"date", "is_required"=>"required"),
            (object)array("system_name"=>"origin_serial_number", "label_name"=>"厂家序列号", "format"=>"text", "is_required"=>""),
            (object)array("system_name"=>"factory_serial_number", "label_name"=>"工厂序列号", "format"=>"text", "is_required"=>"required"),
            (object)array("system_name"=>"amount", "label_name"=>"数量", "format"=>"number", "is_required"=>"required"),
        );

        return view('stock.create', compact('user', 'employee', 'privilege', 'form_inputs'));
    }

    // create new stock unit
    public function postCreate(Request $request)
    {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if (sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->produce==0)) {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }

        # data validation
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'arriving_date' => 'required|date_format:"Y-m-d"',
            'origin_serial_number' => 'required',
            'factory_serial_number' => 'required',
            'amount' => 'required|integer'
        ]);

        # data stripping
        $data = $request->only('name', 'category', 'brand', 'arriving_date', 'origin_serial_number', 'factory_serial_number', 'amount');

        # additional data field edit privilege for admin
        $component = \App\component::create($data);
        $stock = new \App\Stock;
        $stock->remain_amount = $component->amount;
        $stock->component_id = $component->id;
        $stock->save();
        \Session::flash('success', '成功创建了新的库存单元。');

        return redirect('/stock');
    }
}
