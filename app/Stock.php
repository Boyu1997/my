<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function produces()
    {
        return $this->belongsToMany(\App\Produce::class)->withPivot('use_amount')->withTimestamps();
    }

    public function component() {
        return $this->belongsTo('\App\Component');
    }

    protected $fillable = [
        'name', 'category', 'brand', 'serial_number', 'purchase_day', 'purchase_amount'
    ];
}
