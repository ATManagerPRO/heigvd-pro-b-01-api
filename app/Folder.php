<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    /**
     * Get Folder's creator
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get all todoLists of this folder
     */
    public function todoList()
    {
        return $this->hasMany('App\TodoList');
    }
}
