<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(request $request, $post_id){
        $request->validate([
            'body' => 'required'
        ]);

        $user = Auth::user();
        $user->comments()->create([
            'body' => $request->body,
            'post_id' => $post_id
        ]);

        return redirect('/post/'.$post_id);
    }
}
