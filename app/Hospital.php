<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    public function contracts() {
        return $this->hasMany('\App\Contract');
    }

    public function sales() {
        return $this->hasMany('\App\Sale');
    }
}