<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    /**
     * Get all Todo for the current todoList.
     */
    public function todo()
    {
        return $this->hasMany('App\Todo');
    }

    /**
     * Get todoList's creator
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
