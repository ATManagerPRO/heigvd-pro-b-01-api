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

    /**
     * Get todoList's creator
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Get todoList's folder
     */
    public function folder()
    {
        return $this->belongsTo('App\Folder');
    }

    /**
     * Get todoList's creator
     */
    public function usersInvited()
    {
        return $this->belongsToMany('App\User');
    }
}
