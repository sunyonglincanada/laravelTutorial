<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    /**
     * Build the relationship between tags and posts
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        //$tag->posts
        return $this->belongsToMany(Post::class);
    }

    /**
     * Get the tag name in url in case of error that page not found.
     * @return string
     */
    public function getRouteKeyName()
    {

        return 'name';

    }
}
