<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function employee() {
        return $this->belongsTo('\App\Employee');
    }

    public function agent() {
        return $this->belongsTo('\App\Agent');
    }

    public function customer() {
        return $this->belongsTo('\App\Customer');
    }

    public function complement() {
        return $this->belongsTo('\App\Complement');
    }

    public function others() {
        return $this->belongsTo('\App\Other');
    }

    public function competitors() {
        return $this->belongsToMany('\App\Competitor')->withTimestamps();
    }

    public static function employeesNameForDropdown() {
        $employees = \App\User::whereNotNull('employee_id')->orderBy('last_name', 'ASC')->with('employee.privilege')->get();
        $employees_for_dropdown = [];
        $employees_for_dropdown[0] = "请选择销售员";

        foreach ($employees as $employee) {
            if ($employee->employee->privilege->sale)
            {
                $employees_for_dropdown[$employee->employee_id] = $employee->last_name.' '.$employee->first_name;
            }
        }
        return $employees_for_dropdown;
    }

    public static function customersNationForDropdown() {
        $customers = \App\Customer::orderBy('nation', 'ASC')->get();
        $customers_nation_for_dropdown = [];
        $customers_nation_for_dropdown[0] = "请选择国家";
        foreach ($customers as $customer) {
            $customers_nation_for_dropdown[$customer->nation] = $customer->nation;
        }
        return $customers_nation_for_dropdown;
    }
}
