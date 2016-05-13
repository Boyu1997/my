<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function user() {
        return $this->belongsTo('\App\User');
    }

    public function wage() {
        return $this->hasOne('\App\Wage');
    }

    public function privilege() {
        return $this->hasOne('\App\Privilege');
    }

    public function produces() {
        return $this->hasMany('\App\Produce')->withTimestamps();
    }

    public function installs() {
        return $this->hasMany('\App\Install');
    }

}
