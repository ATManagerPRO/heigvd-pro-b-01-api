<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    /**
     * Get all Todo for the current todoList.
     */
    public function todos()
    {
        return $this->hasMany('App\Todo');
    }
}
