<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrivilegeAjaxController extends Controller
{
    public function getNavigation()
    {
        //if (\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            $navigation = collect(array());
            $navigation['group_1'] = collect(array('首页' => '/'));
            if (!sizeof($employee)) {
                $navigation['group_2'] = collect(array('申请' => '/apply'));
                $navigation['group_3'] = collect(array('账户' => '/account'));
            }
            else if ($privilege->master_admin) {
                $navigation['group_2'] = collect(array('采购' => '/purchase', '工资' => '/wage', '出差' => '/travel'));
                $navigation['group_3'] = collect(array('库存' => '/stock', '生产' => 'produce', '安装' => 'install', '维护' => '/maintenance'));
                $navigation['group_4'] = collect(array('销售' => '/sale', '顾客' => '/customer', '合同' => '/contract'));
                $navigation['group_5'] = collect(array('员工' => '/employee', '用户' => '/user', '账户' => '/account'));
            }
            else {
                $navigation['group_2'] = collect(array());
                if ($privilege->produce) $navigation['group_2']->put('生产', '/produce');
                if ($privilege->install) $navigation['group_2']->put('安装', '/install');
                if ($privilege->maintenance) $navigation['group_2']->put('维护', '/maintenance');
                if ($privilege->sale) $navigation['group_2']->put('销售', '/sale');
                $navigation['group_3'] = collect(array('账户' => '/account'));
            }

            return response()->json(
                $navigation
            );
        //}
    }
}
