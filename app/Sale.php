<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function employee() {
        return $this->belongsTo('\App\Employee');
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
