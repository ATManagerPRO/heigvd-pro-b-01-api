<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    /**
     * Get all tags of the user
     */
    public function tag()
    {
        return $this->hasMany('App\Tag');
    }

    /**
     * Get all todoLists of the user
     */
    public function todoList()
    {
        return $this->hasMany('App\TodoList');
    }

    /**
     * Get all folders of the user
     */
    public function folder()
    {
        return $this->hasMany('App\Folder');
    }

    /**
     * Get all todoLists the user is invited in
     */
    public function todoListInvited()
    {
        return $this->belongsToMany('App\TodoList');
    }

    /**
     * Get all the assigned todos
     */
    public function todo()
    {
        return $this->hasMany('App\Todo');
    }
}
