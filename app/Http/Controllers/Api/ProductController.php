<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
      $datas = array();
      $categories = Category::where('parent_id', 7)->get();
      foreach ($categories as $key => $category) {
        $datas[$key]['product'] = $category->title;
        $products = Category::where('parent_id', $category->id)->with('products')->get();
        $datas[$key]['item'] = Category::where('parent_id', $category->id)->with('products')->get();
      }
      return response()->json($datas, 200);
    }

    public function show(Product $product, Request $request)
    {
      dd($product);
      return response()->json($product, 200);
    }
}
