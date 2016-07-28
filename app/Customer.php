<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'nation', 'province', 'city', 'address', 'phone_number', 'fax', 'remark'
    ];

    public function sales() {
        return $this->hasMany('\App\Sale');
    }

    public function contacts() {
        return $this->belongsToMany('\App\Contract')->withTimestamps();
    }
}
