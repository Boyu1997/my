<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function employee()
    {
        return $this->belongsTo('\App\Employee');
    }

    public function agent()
    {
        return $this->belongsTo('\App\Agent');
    }

    public function customer()
    {
        return $this->belongsTo('\App\Customer');
    }

    public function complement()
    {
        return $this->belongsTo('\App\Complement');
    }

    public function other()
    {
        return $this->belongsTo('\App\Other');
    }

    public function competitors()
    {
        return $this->belongsToMany('\App\Competitor')->withTimestamps();
    }

    public static function employeesNameForDropdown()
    {
        $employees = \App\User::whereNotNull('employee_id')->orderBy('last_name', 'ASC')->with('employee.privilege')->get();
        $employees_for_dropdown = [];
        $employees_for_dropdown[0] = "请选择销售员";

        foreach ($employees as $employee) {
            if ($employee->employee->privilege->sale) {
                $employees_for_dropdown[$employee->employee_id] = $employee->last_name.$employee->first_name;
            }
        }
        return $employees_for_dropdown;
    }

    public static function complementsNationForDropdown($privilege, $employee)
    {
        if ($privilege->master_admin) {
            $complements = \App\Complement::orderBy(\DB::raw('convert(nation using gbk)'))->distinct()->get(['nation']);
        } else {
            $complements = $employee->complements()->orderBy(\DB::raw('convert(nation using gbk)'))->distinct()->get(['nation']);
        }
        $complements_nation_for_dropdown = [];
        $complements_nation_for_dropdown[0] = "请选择国家";
        foreach ($complements as $complement) {
            $complements_nation_for_dropdown[$complement->nation] = $complement->nation;
        }
        return $complements_nation_for_dropdown;
    }

    public static function othersNationForDropdown($privilege, $employee)
    {
        if ($privilege->master_admin) {
            $others = \App\Other::orderBy(\DB::raw('convert(nation using gbk)'))->distinct()->get(['nation']);
        } else {
            $others = $employee->others()->orderBy(\DB::raw('convert(nation using gbk)'))->distinct()->get(['nation']);
        }
        $others_nation_for_dropdown = [];
        $others_nation_for_dropdown[0] = "请选择国家";
        foreach ($others as $other) {
            $others_nation_for_dropdown[$other->nation] = $other->nation;
        }
        return $others_nation_for_dropdown;
    }

    public static function newSalesForDropdown($privilege, $employee)
    {
        if ($privilege->master_admin) {
            $sales = \App\Sale::where('status', '=', 'new')->with('customer')->get();
        } else {
            $sales = \App\Sale::where('employee_id', '=', $employee->id)->where('status', '=', 'new')->with('customer')->get();
        }
        $new_sales_for_dropdown = [];
        $new_sales_for_dropdown[0] = "请选择销售记录";
        foreach ($sales as $sale) {
            $new_sales_for_dropdown[$sale->id] = $sale->customer->province.'，'.$sale->customer->city.'，'.$sale->customer->name;
        }
        return $new_sales_for_dropdown;
    }

    public static function showContactData($contact)
    {
        $data = "<div class='row'>";
            $data = $data."<div class='col-md-10'>";
                $data = $data."<table class='table table-bordered'>";
                    $data = $data."<tr><th>姓氏</th><th>".$contact->last_name."</th></tr>";
                    $data = $data."<tr><th>名字</th><th>".$contact->first_name."</th></tr>";
                    $data = $data."<tr><th>职位</th><th>".$contact->job_title."</th></tr>";
                    $data = $data."<tr><th>邮箱地址</th><th>".$contact->email."</th></tr>";
                    $data = $data."<tr><th>电话号</th><th>".$contact->cellphone."</th></tr>";
                $data = $data."</table>";
            $data = $data."</div>";
            $data = $data."<div class='col-md-2'>";
                $data = $data."<button type='button' class='btn btn-danger del_contact_btn' value='".$contact->id."'>删除</button>";
            $data = $data."</div>";
        $data = $data."</div>";

        return $data;
    }
}
