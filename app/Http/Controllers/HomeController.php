<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        //timeline following
        //timeline diri sendiri

        //id for following and current login user
        $id_list = $user->following()->pluck('follows.following_id')->toArray();
        $id_list[] = $user->id;
        

        $posts = Post::with('user','likes')->withCount('likes')->whereIn('user_id', $id_list)->orderBy('created_at', 'desc')->get();

        return view('home', compact('posts'));
    }

    public function search(Request $request){
        $querySearch = $request->input('query');

        $posts = Post::with('user','likes')->withCount('likes')->where('caption', 'like', '%'. $querySearch .'%')->orderBy('created_at', 'desc')->get();

        return view('home', compact('posts', 'querySearch'));
    }
}
