<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Http\Requests\StoreProfile;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function update(StoreProfile $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->sex = $request->sex;
        $user->age = $request->age;

        $user->save();

        return redirect('/');
    }

    public function notification()
    {
        $nice_posts = Post::where('nice_notice', '1')
            ->where('user_id', Auth::id())
            ->latest()->get();

        $comment_posts = Post::where('comment_notice', '1')
            ->where('user_id', Auth::id())
            ->latest()->get();

        return view('profile.notifications', compact('nice_posts', 'comment_posts'));
    }

    public function withdrawConfirm()
    {
        return view('profile.withdraw_confirm');
    }

    public function withdraw($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/');
    }
}
