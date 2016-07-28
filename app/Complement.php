<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complement extends Model
{
    public function sales() {
        return $this->hasMany('\App\Sale');
    }

    public function contacts() {
        return $this->belongsToMany('\App\Contract')->withTimestamps();
    }
}
