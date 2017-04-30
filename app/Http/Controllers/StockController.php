<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class StockController extends Controller
{
    public function getOverview() {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->stock==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $current_stocks = \App\Stock::where('remain_amount', '>', 0)->get();
        return \View::make('stock.overview', compact('user', 'employee', 'privilege', 'current_stocks'));
    }



    // create router
    public function getCreate(Request $request) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->produce==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }

        return view('stock.create', compact('user', 'employee', 'privilege'));
    }

    // create new stock unit
    public function postCreate(Request $request) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->produce==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }

        #data validation
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'serial_number' => 'required',
            'purchase_day' => 'date_format:"Y/m/d"',
            'purchase_amount' => 'required|integer',
        ]);

        # data stripping
        $data = $request->only('name', 'category', 'brand', 'serial_number', 'purchase_day', 'purchase_amount');

        # additional data field edit privilege for admin


        $stock = \App\Stock::create($data);
        $stock->remain_amount = $stock->purchase_amount;
        $stock->save();
        \Session::flash('success', '成功创建了新的库存单元。');
        return redirect('/stock');
    }
}
