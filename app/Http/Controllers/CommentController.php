<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\User;
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

        $this->notify($user, $post_id);

        return redirect('/post/'.$post_id);
    }

    public function notify($user, $post_id){

        $target_id = Post::find($post_id)->user_id;

        //if itu di postingan sendiri, gak perlu ada notif dari diri sendiri
        if($user->id != $target_id){  
            Notification::create([ 
                'user_id' => $target_id,
                'post_id' => $post_id,
                'message' => 'you have new comment from ' . $user->username
            ]);
        }        
    }

    public function edit($id){
        $comment = Comment::findOrFail($id);
        return view('post.comment-edit', compact('comment'));
    }

    public function update(Request $request, $id){
        
        $request->validate([
            'body' => 'required'
        ]);

        $comment = Comment::find($id);

        if($comment->user_id != Auth::user()->id)
            abort(403);

        $comment->update([
            'body' => $request->body
        ]);

        return redirect('/post/' . $comment->post_id);
    }

    public function destroy($id){
        $comment = Comment::find($id);

        if($comment->user_id != Auth::user()->id)
            abort(403);

        $comment->delete();

        return redirect('/post/' . $comment->post_id);
    }
}
