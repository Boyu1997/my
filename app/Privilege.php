<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    public function employee() {
        return $this->hasOne('\App\Employee');
    }
}