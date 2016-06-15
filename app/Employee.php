<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function user() {
        return $this->hasOne('\App\User');
    }

    public function wage() {
        return $this->belongsTo('\App\Wage');
    }

    public function privilege() {
        return $this->belongsTo('\App\Privilege');
    }

    public function produces() {
        return $this->hasMany('\App\Produce')->withTimestamps();
    }

    public function installs() {
        return $this->hasMany('\App\Install');
    }

    public function sales() {
        return $this->hasMany('\App\Sale');
    }
}
