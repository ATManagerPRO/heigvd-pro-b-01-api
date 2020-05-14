<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    /**
     * Get the TodoList that owns the Todo.
     */
    public function todoList()
    {
        return $this->belongsTo('App\TodoList');
    }

    /**
     * Get todo's tags.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * Get the assigned user.
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }

    /**
     * Get todo's interval.
     */
    public function interval()
    {
        return $this->belongsTo('App\Interval');
    }
}
