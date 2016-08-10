<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complement extends Model
{
    public function employees() {
        return $this->belongsToMany('\App\Employee')->withTimestamps();
    }

    public function sales() {
        return $this->hasMany('\App\Sale');
    }

    public function contacts() {
        return $this->belongsToMany('\App\Contact')->withTimestamps();
    }
}
