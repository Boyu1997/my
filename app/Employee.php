<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function user()
    {
        return $this->hasOne(\App\User::class);
    }

    public function wage()
    {
        return $this->belongsTo(\App\Wage::class);
    }

    public function privilege()
    {
        return $this->belongsTo(\App\Privilege::class);
    }

    public function produces()
    {
        return $this->hasMany(\App\Produce::class);
    }

    public function installs()
    {
        return $this->hasMany(\App\Install::class);
    }

    public function sales()
    {
        return $this->hasMany(\App\Sale::class);
    }

    public static function usersLastNameForDropdown()
    {
        $users = \App\User::where('employee_id', '=', null)->orderBy('last_name', 'ASC')->get();
        $users_last_name_for_dropdown = [];
        $users_last_name_for_dropdown[0] = "请选择姓氏";
        foreach ($users as $user) {
            $users_last_name_for_dropdown[$user->last_name] = $user->last_name;
        }
        return $users_last_name_for_dropdown;
    }

    public function agents()
    {
        return $this->belongsToMany(\App\Agent::class)->withTimestamps();
    }

    public function complements()
    {
        return $this->belongsToMany(\App\Complement::class)->withTimestamps();
    }

    public function customers()
    {
        return $this->belongsToMany(\App\Customer::class)->withTimestamps();
    }

    public function others()
    {
        return $this->belongsToMany(\App\Other::class)->withTimestamps();
    }
}
