<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    public function contracts() {
        return $this->hasMany('\App\Contract');
    }

    public function sales() {
        return $this->hasMany('\App\Sale');
    }

    public function contacts() {
        return $this->belongsToMany('\App\Contract')->withTimestamps();
    }
}
