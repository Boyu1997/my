<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function component() {
        return $this->belongsTo(\App\Component::class);
    }

    protected $fillable = [
        'name', 'category', 'brand', 'serial_number', 'purchase_day', 'purchase_amount'
    ];
}
