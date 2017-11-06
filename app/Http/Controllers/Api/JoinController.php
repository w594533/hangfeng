<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Category;
use App\Models\SystemInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JoinController extends Controller
{
    public function index()
    {

      $system_info = SystemInfo::find(1);
      $result = [
        "title" => [
          "JOIN US",
          trans("home.banner_title")
        ],
        "desc" => trans("join.title"),
        "name" => trans("join.name"),
        "adv" => trans("join.adv"),
        "hr_email" => $system_info->hr_email,
        "header" => trans("join.header"),
      ];
      $posts = Post::where('category_id', 24)->select("id", "name", "slug")->get();
      $result['list'] = $posts;
      return response()->json($result, 200);
    }
}
