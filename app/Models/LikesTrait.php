<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;

trait LikesTrait
{
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function is_liked()
    {
        return $this->likes->where('user_id', Auth::user()->id)->count(); //like by user yg sedang login
    }
}
