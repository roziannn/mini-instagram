<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle($type, $object_id)
    {

        if ($type == "POST") {
            $object = Post::find($object_id);
        }else{
            $object = Comment::find($object_id);
        }

        $attr = ['user_id' => Auth::user()->id];

        if ($object->likes()->where($attr)->exists()) {
            $object->likes()->where($attr)->delete();
            $msg = ['status' => 'UNLIKE'];
        } else {
            $object->likes()->create($attr);
            $msg = ['status' => 'LIKE'];
        }

        return response()->json($msg);
    }
}
