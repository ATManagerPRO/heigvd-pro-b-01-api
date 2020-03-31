<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    /**
     * Get goal's creator.
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }

    /**
     * Get all goalTodos for the current goal.
     */
    public function goalTodos()
    {
        return $this->hasMany('App\GoalTodo');
    }

    /**
     * Get goal's interval.
     */
    public function interval()
    {
        return $this->hasOne('App\Interval');
    }
}