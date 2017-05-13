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


            $components = collect(array());
            foreach ($stocks as $stock) {
                $components->push(array(
                    'stock_id' => $stock->id,
                    'model' => $stock->component->name,
                    'category' => $stock->component->category,
                    'brand' => $stock->component->brand,
                    'factory_serial_number' => $stock->component->factory_serial_number,
                    'remain_amount' => $stock->remain_amount,
                ));
            }

            $components = $components->groupBy('category')->transform(function($items) {
                return $items->groupBy('brand')->transform(function($items) {
                    return $items->groupBy('model')->transform(function($items) {
                        $ac = collect(array());
                        foreach ($items as $item) {
                            $ac->push(collect(array(
                                'lable' => $item['factory_serial_number'],
                                'value' => [$item['stock_id'], $item['remain_amount']]
                            )));
                        };
                        return $ac->toArray();
                    });
                });
            });

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
