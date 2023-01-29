<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function is_liked(){
        return $this->likes->where('user_id', Auth::user()->id)->count(); //like by user yg sedang login
    }
}
