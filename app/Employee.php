<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function user()
    {
        return $this->hasOne('\App\User');
    }

    public function wage()
    {
        return $this->belongsTo('\App\Wage');
    }

    public function privilege()
    {
        return $this->belongsTo('\App\Privilege');
    }

    public function produces()
    {
        return $this->hasMany('\App\Produce');
    }

    public function installs()
    {
        return $this->hasMany('\App\Install');
    }

    public function sales()
    {
        return $this->hasMany('\App\Sale');
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
        return $this->belongsToMany('\App\Agent')->withTimestamps();
    }

    public function complements()
    {
        return $this->belongsToMany('\App\Complement')->withTimestamps();
    }

    public function customers()
    {
        return $this->belongsToMany('\App\Customer')->withTimestamps();
    }

    public function others()
    {
        return $this->belongsToMany('\App\Other')->withTimestamps();
    }
}
