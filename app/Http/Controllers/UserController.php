<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use Image;

class UserController extends Controller
{

    public function index()
    {
        $users = User::whereNull('approved_at')->get();

        return view('users', compact('users'));
    }

    public function approve($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update(['approved_at' => now()]);

        return redirect()->route('admin.users.index')->withMessage('User approved successfully');
    }
    public function profile()
    {
        $user = Auth()->user();
        return view('auth.profile')->with('user', $user);
    }
    public function update_avatar(Request $request)
    {
        $user = Auth()->user();
        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $filename =  $user->club . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path(('images/avatars/' . $filename)));

            $user->avatar = $filename;
            $user->save();
        }
        return view('auth.profile')->with('user', $user);
    }


}
