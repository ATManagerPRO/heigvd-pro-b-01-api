<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interval extends Model
{
    /**
     * Get all todos of interval.
     */
    public function todos()
    {
        return $this->hasMany('App\Todo');
    }
    /**
     * Get all goals of interval.
     */
    public function goals()
    {
        return $this->hasMany('App\Goal');
    }
}
