<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class TopController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::latest()->paginate(10);

        $search = $request->input('search');
        $categoryId = $request->input('categoryId');

        $query = Post::query();

        $category = new Category;
        $categories = $category->getLists();

        // カテゴリ検索
        if($categoryId){
            $query->where('category_id', $categoryId);
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
                    ->orWhere('choose_no','Like','%'.$value.'%')
                    ->orWhere('note','Like','%'.$value.'%');
                }
            });
            // $posts = $query->paginate(10);
        }

        $posts = $query->paginate(10);

        return view('top',compact('posts','search','categoryId','categories'));
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
