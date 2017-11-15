<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\SystemInfo;
use App\Models\Cooperation;

class HomeController extends Controller
{

    //首页
    public function index()
    {
      $data = array(
        array(
          'img' => config('app.url') . '/img/banner2.jpg',
          'name' => trans("home.home_banner.first.name"),
          'desc' => trans("home.home_banner.first.desc"),
          'en' => trans("home.home_banner.first.en"),
          'more' => trans("home.view_detail"),
        ),
        array(
          'img' => config('app.url') . '/img/banner4.jpg',
          'name' => trans("home.home_banner.second.name"),
          'desc' => trans("home.home_banner.second.desc"),
          'en' => trans("home.home_banner.second.en"),
          'more' => trans("home.view_detail"),
        ),
        array(
          'img' => config('app.url') . '/img/banner3.jpg',
          'name' => trans("home.home_banner.third.name"),
          'desc' => trans("home.home_banner.third.desc"),
          'en' => trans("home.home_banner.third.en"),
          'more' => trans("home.view_detail"),
        ),
        array(
          'img' => config('app.url') . '/img/banner1.jpg',
          'name' => trans("home.home_banner.fourth.name"),
          'desc' => trans("home.home_banner.fourth.desc"),
          'en' => trans("home.home_banner.fourth.en"),
          'more' => trans("home.view_detail"),
        )
      );
      return response()->json($data, 200);
    }

    //新闻
    public function cooperation()
    {
      $data['title'] = array(
        'ABOUT US',
        trans("home.banner_title")
      );
      $data['list'] = Category::where('parent_id', 48)->select('id', 'title')->with('cooperations')->get();
      return response()->json($data, 200);
    }

    // 联系我们
    public function contact()
    {
      $system_info = SystemInfo::find(1);
      $result['contact'] = [
        [
          "title" => trans('home.contact.tel'),
          "value" => $system_info->phone,
        ],
        [
          "title" => trans("home.contact.fax"),
          "value" => $system_info->facsimile,
        ],
        [
          "title" => trans("home.contact.email"),
          "value" => $system_info->email,
        ],
        [
          "title" => trans("home.contact.address"),
          "value" => $system_info->address
        ],
        [
          "title" => trans("home.contact.postal"),
          "value" => 311800
        ]
      ];
      $result['name'] = trans("home.menu.contact_us");
      $result['title'] = array(
        'CONTACT US',
        trans("home.banner_title")
      );
      return response()->json($result, 200);
    }

    //关于我们
    public function about()
    {
      $system_info = SystemInfo::find(1);
      $menu_about = Category::where("parent_id", 1)->select("id", "title")->get();
      $result['title'] = array(
        'ABOUT US',
        trans("home.banner_title")
      );
      $result['intro'] = array(
        trans("home.about.hangfenggaikuang"),
        $system_info->about_body,
      );
      $result['router'] = array(
        "title" => trans("home.about.router.title"),
        "desc" => trans("home.about.router.desc"),
        "nav" => $menu_about,
        "data" => [
          "show" => $system_info->about_show_business_images,
          "honor" => $system_info->about_honor_images,
          "partner" => [
            "title" => trans("home.about.router.partner.title"),
            "img" => config('app.url') . '/img/about_partner.png',
            "detail" => [
              "title" => trans("home.about.router.partner.detail.title"),
              "content" => trans("home.about.router.partner.detail.content"),
              "more" => trans("home.view_partner_more"),
            ],
          ],
          "culture" => [
              "left" => [
                  "image" => config('app.url') . '/img/cultures1.jpg',
                  "text" => trans("home.culture.left_text")
              ],
              "right" => [
                  'image' => config('app.url') . '/img/cultures2.jpg',
                  'text' => trans("home.culture.right_text")
              ]
          ],
          "dev" => [
            $system_info->about_vision_title,
            $system_info->about_vision_body
          ]
        ]
      );
      return response()->json($result, 200);
    }

    public function systems_info()
    {
      $menu_product = Category::where("parent_id", 7)->select("id", "title")->get();
      $menu_news = Category::where("parent_id", 19)->select("id", "title")->get();
      $menu_about = Category::where("parent_id", 1)->select("id", "title")->get();
      $system_info = SystemInfo::find(1);

      $result['nav'] = [
        ["title" => trans("home.menu.home")],
    		["title" => trans("home.menu.about"), "detail" => $menu_about],
    		["title" => trans("home.menu.product"), "detail" => $menu_product],
    		["title" => trans("home.menu.news"), "detail" => $menu_news],
    		["title" => trans("home.menu.join_us")],
    		["title" => trans("home.menu.contact_us")]
      ];
      $result['meta'] = [
        'meta_title' => $system_info->meta_title,
        'meta_keywords' => $system_info->meta_keywords,
        'meta_description' => $system_info->meta_description
      ];
      return response()->json($result, 200);
    }
}
