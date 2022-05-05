<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Notification;
use App\Http\Requests\StoreProfile;

class ProfileController extends Controller
{
    public function notification()
    {
        $notifications = Notification::where('user_id', Auth::id())
            ->whereNull('read')
            ->latest()->get();

        return view('profile.notifications', compact('notifications'));

    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(StoreProfile $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        // $user->email = $request->email;
        $user->sex = $request->sex;
        $user->age = $request->age;

        $user->save();

        return redirect('/');
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
