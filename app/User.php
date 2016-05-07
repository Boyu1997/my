<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'first_name', 'last_name', 'email', 'cellphone', 'password'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function employee() {
        return $this->hasOne('\App\Employee');
    }

    public static function employeesNameForDropdown() {
        $employees = \App\User::whereNotNull('employee_id')->orderBy('last_name', 'ASC')->get();
        $employees_for_dropdown = [];
        $employees_for_dropdown[0] = 'Choose a employee...';

        foreach ($employees as $employee) {
            $employees_for_dropdown[$employee->employee_id] = $employee->last_name.' '.$employee->first_name;
        }
        return $employees_for_dropdown;
    }
}
