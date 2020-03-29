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
     * Get todo's tags
     */
    public function tag()
    {
        return $this->belongsToMany('App\Tag');
    }
}
