<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * Get Tasks that not completed.
     * @param $query
     * @return mixed
     *
     * @author Eric
     * @date 2018-01-14
     */
    public function scopeIncomplete($query)
    {
        return $query->where('completed', 0);
    }
}
