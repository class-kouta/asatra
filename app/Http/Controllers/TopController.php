<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class TopController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::latest()->paginate(10);

        $search = $request->input('search');

        $query = Post::query();

        if($search){
            $spaceConversion = mb_convert_kana($search, 's');
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            foreach($wordArraySearched as $value){
                $query->where('title','Like','%'.$value.'%')
                    ->orWhere('describe','Like','%'.$value.'%')
                    ->orWhere('explain','Like','%'.$value.'%')
                    ->orWhere('specify','Like','%'.$value.'%')
                    ->orWhere('choose_yes','Like','%'.$value.'%')
                    ->orWhere('choose_no','Like','%'.$value.'%')
                    ->orWhere('note','Like','%'.$value.'%');
            }

            $posts = $query->paginate(10);
        }

        return view('top',compact('posts','search'));
    }
}
