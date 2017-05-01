<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    public function sales()
    {
        return $this->belongsToMany('\App\Sales')->withTimestamps();
    }

    public function contacts()
    {
        return $this->belongsToMany('\App\Contract')->withTimestamps();
    }
}
