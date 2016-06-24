<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function agents() {
        return $this->belongsToMany('\App\Agent')->withTimestamps();
    }

    public function complements() {
        return $this->belongsToMany('\App\Complement')->withTimestamps();
    }

    public function hospitals() {
        return $this->belongsToMany('\App\Hospital')->withTimestamps();
    }

    public function others() {
        return $this->belongsToMany('\App\Other')->withTimestamps();
    }

    public function competitors() {
        return $this->belongsToMany('\App\Competitor')->withTimestamps();
    }
}
