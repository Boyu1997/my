<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    public function produce()
    {
        return $this->hasOne(\App\Produce::class);
    }

    public function sale()
    {
        return $this->hasOne(\App\Sale::class);
    }
}
