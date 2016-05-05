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
}
