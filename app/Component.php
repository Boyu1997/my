<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    public function stock() {
        return $this->hasOne('\App\Stock');
    }
}
