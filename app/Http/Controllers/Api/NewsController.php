<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index(Request $request)
    {
      $result['title'] = [
        "NEWS",
        trans("home.banner_title")
      ];
      $categories = Category::where('parent_id', 19)->select("id", "title")->get();
      $result['categories'] = $categories;

      if ($request->category_id) {
        $category_id = $request->category_id;
      } else {
        $category_id = Category::where('parent_id', 19)->first()->id;
      }

      $news_posts = Post::where('category_id', $category_id)->orderBy('id', 'desc')->get();
      $result['list'] = $news_posts;
      return response()->json($result, 200);
    }
}
