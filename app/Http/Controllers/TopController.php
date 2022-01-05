<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class TopController extends Controller
{
    public function index(Category $category, Request $request)
    {
        $search = $request->input('search');
        $category_id = $request->input('category_id');

        $query = Post::query();

        $categories = $category->getLists();

        // カテゴリ検索
        if($category_id){
            $query->where('category_id', $category_id);
        }

        // キーワード検索
        if($search){
            $search = $this->escape($search);
            $spaceConversion = mb_convert_kana($search, 's');
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            $query->where(function($query) use ($wordArraySearched){
                foreach($wordArraySearched as $value){
                    $query->where('title','Like','%'.$value.'%')
                    ->orWhere('describe','Like','%'.$value.'%')
                    ->orWhere('explain','Like','%'.$value.'%')
                    ->orWhere('specify','Like','%'.$value.'%')
                    ->orWhere('choose_yes','Like','%'.$value.'%')
                    ->orWhere('choose_no_reply','Like','%'.$value.'%')
                    ->orWhere('choose_no_answer','Like','%'.$value.'%')
                    ->orWhere('note','Like','%'.$value.'%');
                }
            });
        }

        $posts = $query->latest()->paginate(10);

        return view('top',compact('posts','search','category_id','categories'));
    }

    private function escape(string $value)
    {
        return str_replace(
            ['\\', '%', '_'],
            ['\\\\', '\\%', '\\_'],
            $value
        );
    }
}
