<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produce extends Model
{
    protected $fillable = [
        'model', 'serial_number', 'finished_at', 'sold_at', 'sold_to', 'employee_id'
    ];

    public function employees() {
        return $this->belongsTo('\App\Employee')->withTimestamps();
    }

    public function install() {
        return $this->belongsTo('\App\Install');
    }

    public static function recentMonthlySummery() {
        $recent_month = \App\Produce::recentMonth();
        $recent_year = [0, 0, 0, 0, 0];
        $recent_monthly_summery = [0, 0, 0, 0, 0];
        $recent_year[4] = date('Y');
        if($recent_month[4]-$recent_month[0]>0) $difference=-1;
        else $difference = 12 - $recent_month[0];
        for ($i=0; $i<=4; $i++)
        {
            if($i<=$difference) $recent_year[$i] = $recent_year[4] - 1;
            else $recent_year[$i] = $recent_year[4];
            if ($recent_month[$i]<10) $recent_month[$i] = $recent_year[$i].'/0'.$recent_month[$i];
            else $recent_month[$i] = $recent_year[$i].'/'.$recent_month[$i];
        }
        $user = \Auth::user();
        $employee = \App\Employee::where('id', '=', $user->employee_id)->first();
        if ($employee->privilege_id)
        {
            $privilege = \App\Privilege::where('id', '=', $employee->privilege_id)->first();
            if ($privilege->master_admin)
            {
                $produces = \App\Produce::all();
                foreach ($produces as $produce)
                {
                    $month = date('Y/m', strtotime($produce->finished_at));
                    foreach ($recent_month as $key=>$the_month)
                    {
                        if ($month==$the_month) {
                            $recent_monthly_summery[$key]++;
                        }
                    }
                }
            }
            else
            {
                $produces = \App\Produce::where('employee_id', '=', $employee->id)->get();
                foreach ($produces as $produce)
                {
                    $month = date('Y/m', strtotime($produce->finished_at));
                    foreach ($recent_month as $key=>$the_month)
                    {
                        if ($month==$the_month) {
                            $recent_monthly_summery[$key]++;
                        }
                    }
                }
            }
        }
        else
        {
            $produces = \App\Produce::where('employee_id', '=', $employee->id)->get();
            foreach ($produces as $produce)
            {
                $month = date('Y/m', strtotime($produce->finished_at));
                foreach ($recent_month as $key=>$the_month)
                {
                    if ($month==$the_month) {
                        $recent_monthly_summery[$key]++;
                    }
                }
            }
        }
        return $recent_monthly_summery;
    }

    public static function recentMonth() {
        $recent_month = [0, 0, 0, 0, 0];
        $recent_month[0] = date('n') - 4;
        if ($recent_month[0]<1) $recent_month[0] += 12;
        for ($i=1; $i<=4; $i++)
        {
            $recent_month[$i] = $recent_month[$i-1] + 1;
            if ($recent_month[$i]>12) $recent_month[$i] -= 12;
        }
        return $recent_month;
    }

    public static function producesSerialNumberForDropdown() {
        $produces = \App\Produce::whereNull('install_id')->orderBy('serial_number', 'ASC')->get();
        $produces_for_dropdown = [];
        $produces_for_dropdown[0] = 'Choose a product...';

        foreach ($produces as $produce) {
            $produces_for_dropdown[$produce->id] = $produce->serial_number;
        }
        return $produces_for_dropdown;
    }


}
