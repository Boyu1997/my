<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    public function employee() {
        return $this->hasOne('\App\Employee');
    }

    public static function privilegeAuth() {
        $user = \Auth::user();
        if ($user->employee_id) {
            $employee = \App\Employee::where('id', '=', $user->employee_id)->first();
            if ($employee->privilege_id)
            {
                $privilege = \App\Privilege::where('id', '=', $employee->privilege_id)->first();
            }
            else $privilege = [];
        }
        else {
            $employee = [];
            $privilege = [];
        }

        return array ($user, $employee, $privilege);
    }
}
