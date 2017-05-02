<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function component() {
        return $this->belongsTo(\App\Component::class);
    }
}
