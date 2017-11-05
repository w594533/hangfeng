<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Cooperation;

class HomeController extends Controller
{
    public function index()
    {
      $data = array(
        array(
          'img' => config('app.url') . '/img/banner1.jpg',
          'name' => '航丰针纺织',
          'desc' => '完美的品质源于对细节的执着',
          'en' => 'THE QUALITY OF PERTFCTION COMES FROM THE PERSISTENCE OF DETAIL',
          'more' => '查看详情'
        ),
        array(
          'img' => config('app.url') . '/img/banner2.jpg',
          'name' => '',
          'desc' => '诸暨航丰针纺织有限公司',
          'en' => "诸暨航丰针纺织有限公司成立于2004年,公司专业生产各类航空用座椅外套、毛毯、被、枕头、枕套、餐巾、桌布、无纺布头靠等系列产品，是集产品设计、开发、生产、销售于一体的航空纺织用品综合企业。",
    			'more' => "查看详情"
        ),
        array(
          'img' => config('app.url') . '/img/banner3.jpg',
    			'name' => "合作伙伴",
    			'desc' => "领引非凡成就",
    			'en' => "LEAD EXTRAORDINARY ACHIEVEMENT",
    			'more' => "查看详情"
        ),
        array(
          'img' => config('app.url') . '/img/banner4.jpg',
    			'name' => "航丰",
    			'desc' => "航空纺织领导者",
    			'en' => "Aviation Textile Leader",
    			'more' => "查看详情"
        )
      );
      return response()->json($data, 200);
    }

    public function cooperation()
    {
      $data['title'] = array(
        'ABOUT US',
        '聚焦行业焦点，了解航丰最新资讯，掌握行业动态'
      );
      $data['list'] = Category::where('parent_id', 48)->select('id', 'title')->with('cooperations')->get();
      return response()->json($data, 200);
    }
}
