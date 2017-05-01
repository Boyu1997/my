<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function agents()
    {
        return $this->belongsToMany(\App\Agent::class)->withTimestamps();
    }

    public function complements()
    {
        return $this->belongsToMany(\App\Complement::class)->withTimestamps();
    }

    public function customers()
    {
        return $this->belongsToMany(\App\Customer::class)->withTimestamps();
    }

    public function others()
    {
        return $this->belongsToMany(\App\Other::class)->withTimestamps();
    }

    public function competitors()
    {
        return $this->belongsToMany(\App\Competitor::class)->withTimestamps();
    }
}
