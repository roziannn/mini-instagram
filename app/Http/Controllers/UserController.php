<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request){
        $user = Auth::user();

        $request->validate([
            'username' => 'required|alpha_dash|min:3|max:20|unique:users,username,' . $user->id, //kecuali username sendiri, sdh unique
            'fullname' => 'max:30',
            'bio' => 'max:255'
        ]);

        $user->update([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'bio' => $request->bio,
        ]);

        return redirect('user/edit');
    }
}
