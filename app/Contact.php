<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function organizations()
    {
        return $this->belongsToMany(\App\Organization::class)->withTimestamps();
    }
}
