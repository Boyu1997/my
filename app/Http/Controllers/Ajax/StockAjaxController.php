<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockAjaxController extends Controller
{
    public function getInfo()
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

            return response()->json(
                $components
            );
        }
    }
}
