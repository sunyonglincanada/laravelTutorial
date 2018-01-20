<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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


    /**
     * Filter Archive Url Params
     * @param $query
     * @param $filters
     */
    public function scopeFilter($query, $filters)
    {
        if(empty($filters)){
            return;
        }

        if($month = $filters['month']) {

            $query->whereMonth('created_at', Carbon::parse($month)->month);

        }


        if($year = $filters['year']) {

            $query->whereYear('created_at', $year);

        }
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

}
