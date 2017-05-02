<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produce extends Model
{
    protected $fillable = [
        'model', 'serial_number', 'start_at', 'end_at', 'employee_id'
    ];

    public function employee()
    {
        return $this->belongsTo(\App\Employee::class);
    }

    public function install()
    {
        return $this->belongsTo(\App\Install::class);
    }

    public function contract()
    {
        return $this->belongsTo(\App\Contract::class);
    }

    public function components() {
        return $this->belongsToMany(\App\Component::class)->withPivot('use_amount')->withTimestamps();
    }

    public static function recentMonthlySummery($user, $employee, $privilege)
    {
        $recent_month = \App\Produce::recentMonth();
        $recent_year = [0, 0, 0, 0, 0];
        $recent_monthly_summery = [0, 0, 0, 0, 0];
        $recent_year[4] = date('Y');
        if ($recent_month[4]-$recent_month[0]>0) {
            $difference=-1;
        } else {
            $difference = 12 - $recent_month[0];
        }
        for ($i=0; $i<=4; $i++) {
            if ($i<=$difference) {
                $recent_year[$i] = $recent_year[4] - 1;
            } else {
                $recent_year[$i] = $recent_year[4];
            }
            if ($recent_month[$i]<10) {
                $recent_month[$i] = $recent_year[$i].'/0'.$recent_month[$i];
            } else {
                $recent_month[$i] = $recent_year[$i].'/'.$recent_month[$i];
            }
        }
        if (sizeof($privilege) && $privilege->master_admin) {
            $produces = \App\Produce::all();
            foreach ($produces as $produce) {
                $month = date('Y/m', strtotime($produce->end_at));
                foreach ($recent_month as $key => $the_month) {
                    if ($month==$the_month) {
                        $recent_monthly_summery[$key]++;
                    }
                }
            }
        } else {
            $produces = \App\Produce::where('employee_id', '=', $employee->id)->get();
            foreach ($produces as $produce) {
                $month = date('Y/m', strtotime($produce->end_at));
                foreach ($recent_month as $key => $the_month) {
                    if ($month==$the_month) {
                        $recent_monthly_summery[$key]++;
                    }
                }
            }
        }
        return $recent_monthly_summery;
    }

    public static function recentMonth()
    {
        $recent_month = [0, 0, 0, 0, 0];
        $recent_month[0] = date('n') - 4;
        if ($recent_month[0]<1) {
            $recent_month[0] += 12;
        }
        for ($i=1; $i<=4; $i++) {
            $recent_month[$i] = $recent_month[$i-1] + 1;
            if ($recent_month[$i]>12) {
                $recent_month[$i] -= 12;
            }
        }
        return $recent_month;
    }

    public static function employeesNameForDropdown()
    {
        $employees = \App\User::whereNotNull('employee_id')->orderBy('last_name', 'ASC')->with('employee.privilege')->get();
        $employees_for_dropdown = [];
        $employees_for_dropdown[0] = '请选择';

        foreach ($employees as $employee) {
            if ($employee->employee->privilege->produce) {
                $employees_for_dropdown[$employee->employee_id] = $employee->last_name.$employee->first_name;
            }
        }
        return $employees_for_dropdown;
    }

    public static function producesSerialNumberForDropdown()
    {
        $produces = \App\Produce::whereNull('install_id')->orderBy('serial_number', 'ASC')->get();
        $produces_for_dropdown = [];
        $produces_for_dropdown[0] = '请选择';

        foreach ($produces as $produce) {
            $produces_for_dropdown[$produce->id] = $produce->serial_number;
        }
        return $produces_for_dropdown;
    }
}
