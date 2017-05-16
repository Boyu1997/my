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

    public function organizations()
    {
        return $this->belongsToMany(\App\Organization::class)->withTimestamps();
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
}
