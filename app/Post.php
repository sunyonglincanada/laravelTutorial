<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    // $post->comments

    /**
     * a post can have many comments
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function addComment($body)
    {

        $this->comments()->create(compact('body'));


//        Comment::create([
//
//            'body' => request('body'),
//            'post_id' => $this->id
//        ]);

        // $post->user
    }
    /**
     * a post belongs to a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
