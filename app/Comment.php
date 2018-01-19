<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // In case of mass assignment
    protected $guarded = [];


    // $comment->post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
