<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Get the tag's owner (user)
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get todos that use this tag
     */
    public function todos()
    {
        return $this->belongsToMany('App\Todo');
    }
}
