<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    // In case of mass assignment
    protected $guarded = [];

    // $comment->post
    /**
     * a comment belogs to a post
     * @return mixed
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // $comment->user
    /**
     * a comment belongs to a user
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
