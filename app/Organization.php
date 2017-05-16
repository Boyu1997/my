<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    public function sales()
    {
        return $this->belongsToMany(\App\Sale::class)->withTimestamps();
    }

    public function employees()
    {
        return $this->belongsToMany(\App\Employee::class)->withTimestamps();
    }
}
