<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->sex = $request->sex;

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
