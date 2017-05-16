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
                                'label' => $item['factory_serial_number'],
                                'value' => $item
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

    public function employee()
    {
        if (\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if (sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->produce==0)) {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            if ($privilege->master_admin) {
                $employees=\App\Privilege::where('produce', '=', '1')->with('employee.user')->get()->transform(function($items) {
                    return collect(array(
                        'employee_id' => $items->employee->id,
                        'last_name' => $items->employee->user->last_name,
                        'first_name' => $items->employee->user->first_name
                    ));
                });

            }
            else {

            }

            return response()->json(
                $employees
            );
        }
    }
}
