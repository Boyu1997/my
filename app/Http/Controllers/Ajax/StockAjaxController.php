<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockAjaxController extends Controller
{
    public function getOverview()
    {
        if (\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if (sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->produce==0)) {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            $stocks = \App\Stock::with('component')->get();


            $components_header = array(
                collect(array('prop' => 'model', 'label' => '型号')),
                collect(array('prop' => 'category', 'label' => '类型')),
                collect(array('prop' => 'brand', 'label' => '品牌')),
                collect(array('prop' => 'factory_serial_number', 'label' => '工厂序列号')),
                collect(array('prop' => 'remain_amount', 'label' => '剩余数量'))
            );

            $components = collect(array());
            foreach ($stocks as $stock) {
                $components->push(array(
                    'stock_id' => $stock->id,
                    'model' => $stock->component->name,
                    'category' => $stock->component->category,
                    'brand' => $stock->component->brand,
                    'factory_serial_number' => $stock->component->factory_serial_number,
                    'remain_amount' => $stock->remain_amount
                ));
            };

            return response()->json([
                'headers' => $components_header,
                'data' => $components
            ]);
        }
    }
}
