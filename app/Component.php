<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    public function produces() {
        return $this->belongsToMany(\App\Produce::class)->withPivot('use_amount')->withTimestamps();
    }

    public function stock() {
        return $this->hasOne(\App\Stock::class);
    }
}
