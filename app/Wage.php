<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wage extends Model
{
    public function employee()
    {
        return $this->hasOne(\App\Employee::class);
    }
}
