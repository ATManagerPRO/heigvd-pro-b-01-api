<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use Notifiable;

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
}
