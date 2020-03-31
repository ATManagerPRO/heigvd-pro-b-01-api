<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoalTodo extends Model
{
    /**
     * Get the goal that owns the goalTodo.
     */
    public function goal()
    {
        return $this->belongsTo('App\Goal');
    }
}
