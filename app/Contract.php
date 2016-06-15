<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    public function produce() {
        return $this->hasOne('\App\Produce');
    }

    public function agent() {
        return $this->belongsTo('\App\Agent');
    }

    public function hospital() {
        return $this->belongsTo('\App\Hospital');
    }

    public function complement() {
        return $this->belongsTo('\App\Complement');
    }
}
