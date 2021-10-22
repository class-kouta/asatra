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
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->sex = $request->sex;

        $user->save();

        if($request->user_img){
            if($request->user_img->extension() == 'gif'
            || $request->user_img->extension() == 'jpeg'
            || $request->user_img->extension() == 'jpg'
            || $request->user_img->extension() == 'png'){
                $request
                ->file('user_img')
                ->storeAs('public/user_img',$user->id.'.'.$request->user_img->extension());
            }
        }

        return redirect('mypage');
    }
}
