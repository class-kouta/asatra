<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $user_form = $request->all();
        $user = Auth::user();

        unset($user_form['_token']);

        $user->fill($user_form)->save();

        return redirect('mypage');
    }
}
