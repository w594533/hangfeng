<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      #新闻
      $category_ids = [20, 21, 22, 23];
      foreach ($category_ids as $key => $category_id) {
        $products = factory('App\Models\Post', 11)->create([
          'category_id' => $category_id,
        ]);
      }

      #招聘数据
      $datas = [
          [
            'name' => '总经理助理',
            'cover' => '',
            'category_id' => 24,
            'slug' => '招聘总经理助理的具体要求内容XXXXX',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
          ],[
            'name' => '行政专员',
            'cover' => '',
            'category_id' => 24,
            'slug' => '招聘行政专员的具体要求内容XXXXX',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
          ],[
            'name' => '总监',
            'cover' => '',
            'category_id' => 24,
            'slug' => '招聘总监的具体要求内容XXXXX',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
          ],
      ];
      DB::table('posts')->insert($datas);
    }
}
