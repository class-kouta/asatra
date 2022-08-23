<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Enums\PostStatusType;
use App\Enums\SortType;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');
        $category_id = $request->input('category_id');
        $sorting = $request->input('sorting');


        $query = Post::query()
            ->whereNotIn('status', [PostStatusType::SECRET, PostStatusType::DRAFT]);

        $categories = Category::pluck('name', 'id');

        // カテゴリ検索
        if($category_id){
            $query->where('category_id', $category_id);
        }

        // キーワード検索
        if($search){
            $search = $this->escape($search);
            $word_array_searched = preg_split('/[\s　,]+/', $search, -1, PREG_SPLIT_NO_EMPTY);
            $query->where(function($query) use ($word_array_searched){
                foreach($word_array_searched as $value){
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

        // 並び替え
        switch ($sorting) {
            case SortType::LATEST:
            case '':
                $posts = $query->latest()->paginate(10);
                break;
            case SortType::OLDEST:
                $posts = $query->oldest()->paginate(10);
                break;
            case SortType::NICE_DESC:
                $posts = $query
                    ->withCount('nices')
                    ->orderBy('nices_count', 'desc')
                    ->latest()
                    ->paginate(10);
                break;
            default:
                abort(404);
        }

        return view('search',compact('posts', 'search', 'category_id', 'categories' ));
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
