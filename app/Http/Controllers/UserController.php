<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/');
    }

    public function delete_confirm()
    {
        return view('delete_confirm');
    }
}
