<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function produces() {
        return $this->belongsToMany('\App\Produce')->withPivot('use_amount')->withTimestamps();
    }
}
