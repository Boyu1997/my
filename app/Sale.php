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

    public function customer() {
        return $this->belongsTo('\App\Customer');
    }

    public function complement() {
        return $this->belongsTo('\App\Complement');
    }

    public function others() {
        return $this->belongsTo('\App\Other');
    }

    public function competitors() {
        return $this->belongsToMany('\App\Competitor')->withTimestamps();
    }
}
