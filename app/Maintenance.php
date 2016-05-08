<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    public function employee() {
        return $this->belongsTo('\App\Employee');
    }

    public function produce() {
        return $this->belongsTo('\App\Produce');
    }
}
