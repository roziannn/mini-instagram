<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'required|alpha_dash|min:3|max:20|unique:users,username,' . $user->id, //kecuali username sendiri, sdh unique
            'fullname' => 'max:30',
            'bio' => 'max:255',
            'avatar' => 'image|mimes:jpeg,jpg,png'
        ]);

        $imageName = $user->avatar;

        //create name for avatar
        if ($request->avatar) {
            $avatar_img = $request->avatar;
            $imageName = $user->username . '-' . time() . '.' . $avatar_img->extension();
            $avatar_img->move(public_path('images/avatar'), $imageName);
        }

        $user->update([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'bio' => $request->bio,
            'avatar' => $imageName
        ]);

        return redirect('user/edit');
    }

    public function show($username)
    {
        $user = User::with('posts')->where('username', $username)->first();
        //if no user or user empty
        if (!$user) abort(404);

        return view('user.profile', compact('user'));
    }

    public function follow($following_id) //endpoint 
    {
        $user = Auth::user();

        //apakah following nya sudah pernah follow akun ini sblmnya
        if ($user->following->contains($following_id)) {
            $user->following()->detach($following_id); //unfollow
            $message = ['status' => 'UNFOLLOW']; 
        } else {
            $user->following()->attach($following_id); //follow
            $message = ['status' => 'FOLLOW'];
        }

        return response()->json($message);
    }

    public function notification() 
    {
        $user = Auth::user();
        
        $notifs = Notification::where('user_id', $user->id)->paginate(15);

        return view('user.notification', compact('notifs'));
    }

    public function notificationSeen() 
    {
        $user = Auth::user();
        
        Notification::where('user_id', $user->id)->update(['seen' => true]);

        return ['msg' => 'success'];
    }

    public function notificationCount() 
    {
        $total = Auth::user()->notifications()->where('seen', 0)->count();
        return ['total' => $total];
    }
}
