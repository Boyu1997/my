<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'nation', 'province', 'city', 'address', 'phone_number', 'fax', 'remark'
    ];

    public function employees()
    {
        return $this->belongsToMany(\App\Employee::class)->withTimestamps();
    }

    public function sales()
    {
        return $this->hasMany(\App\Sale::class);
    }

    public function contacts()
    {
        return $this->belongsToMany(\App\Contact::class)->withTimestamps();
    }
}
