<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProduceAjaxController extends Controller
{
    public function getCreateStock()
    {
        if (\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if (sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->produce==0)) {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            $stocks = \App\Stock::with('component')->get();
            $components = array();
            foreach ($stocks as $stock) {
                array_push($components, (object)array(
                    'stock_id' => $stock->id,
                    'model' => $stock->component->name,
                    'category' => $stock->component->category,
                    'brand' => $stock->component->brand,
                    'origin_serial_number' => $stock->component->origin_serial_number,
                    'factory_serial_number' => $stock->component->factory_serial_number,
                    'remain_amount' => $stock->remain_amount,
                ));
            }
            return response()->json(
                $components
            );
        }
    }

    public function postCreateStock(Request $request)
    {
        if (\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if (sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->produce==0)) {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            $this->validate($request, [
                'stock_id' => 'required|numeric',
            ]);
            $stock = \App\Stock::find($request->stock_id);
            $this->validate($request, [
                'use_amount' => 'required|numeric|max:'.$stock->remain_amount,
            ]);
            if ($request->session()->has('add_stock')) {
                $request->session()->regenerate();
            }
            $request->session()->push('add_stock.'.$request->stock_id, (int)$request->use_amount);
            return response()->json([
                'stock' => $stock->id,
                'amount' => (int)$request->use_amount
            ]);
        }
    }

    public function postDeleteStock(Request $request)
    {
        if (\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if (sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->produce==0)) {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            $this->validate($request, [
                'stock_id' => 'required|numeric',
            ]);
            $request->session()->regenerate();
            $request->session()->forget('add_stock.'.$request->stock_id);
        }
    }
}
