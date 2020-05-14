<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    /**
     * Get all tags of the user
     */
    public function tags()
    {
        return $this->hasMany('App\Tag');
    }

    /**
     * Get all todoLists of the user
     */
    public function todosList()
    {
        return $this->hasMany('App\TodoList');
    }

    /**
     * Get all folders of the user
     */
    public function folders()
    {
        return $this->hasMany('App\Folder');
    }

    /**
     * Get all todoLists the user is invited in
     */
    public function todosListInvited()
    {
        return $this->belongsToMany('App\TodoList')->withTimestamps();
    }

    /**
     * Get all the assigned todos
     */
    public function todos()
    {
        return $this->hasMany('App\Todo');
    }
}
