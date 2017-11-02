<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->delete();

        \DB::table('categories')->insert([

           0 => [
               'id' => '1',
               'title' => '品牌故事',
               'order' => '1',
               'parent_id' => '0'
           ],
           1 => [
               'id' => '2',
               'title' => '品牌介绍',
               'order' => '1',
               'parent_id' => '1'
           ],
           2 => [
               'id' => '3',
               'title' => '品牌荣誉',
               'order' => '2',
               'parent_id' => '1'
           ],
            3 => [
                'id' => '4',
                'title' => '合作伙伴',
                'order' => '3',
                'parent_id' => '1'
            ],
            4 => [
                'id' => '5',
                'title' => '企业文化',
                'order' => '4',
                'parent_id' => '1'
            ],
            5 => [
                'id' => '6',
                'title' => '发展愿景',
                'order' => '5',
                'parent_id' => '1'
            ],

            6 => [
                'id' => '7',
                'title' => '产品展示',
                'order' => '1',
                'parent_id' => '0'
            ],
            7 => [
                'id' => '8',
                'title' => '航空座椅外套',
                'order' => '5',
                'parent_id' => '7'
            ],
            8 => [
                'id' => '9',
                'title' => '航空毛毯',
                'order' => '5',
                'parent_id' => '7'
            ],
            9 => [
                'id' => '10',
                'title' => '梭织毛毯',
                'order' => '5',
                'parent_id' => '9'
            ],
            10 => [
                'id' => '11',
                'title' => '针织毛毯',
                'order' => '5',
                'parent_id' => '9'
            ],
            11 => [
                'id' => '12',
                'title' => '无纺布产品',
                'order' => '5',
                'parent_id' => '7'
            ],
            12 => [
                'id' => '13',
                'title' => '枕巾',
                'order' => '5',
                'parent_id' => '12'
            ],
            13 => [
                'id' => '14',
                'title' => '航空单品',
                'order' => '5',
                'parent_id' => '7'
            ],
            14 => [
                'id' => '15',
                'title' => '餐巾',
                'order' => '5',
                'parent_id' => '14'
            ],
            15 => [
                'id' => '16',
                'title' => '其他航空单品',
                'order' => '5',
                'parent_id' => '7'
            ],
            16 => [
                'id' => '17',
                'title' => '充气枕',
                'order' => '5',
                'parent_id' => '7'
            ],
            17 => [
                'id' => '18',
                'title' => '酒店纺织单品',
                'order' => '5',
                'parent_id' => '7'
            ],
            18 => [
                'id' => '19',
                'title' => '新闻中心',
                'order' => '1',
                'parent_id' => '0'
            ],
            19 => [
                'id' => '20',
                'title' => '公司动态',
                'order' => '1',
                'parent_id' => '19'
            ],
            20 => [
                'id' => '21',
                'title' => '行业资讯',
                'order' => '1',
                'parent_id' => '19'
            ],
            21 => [
                'id' => '22',
                'title' => '媒体焦点',
                'order' => '1',
                'parent_id' => '19'
            ],
            22 => [
                'id' => '23',
                'title' => '通知动态',
                'order' => '1',
                'parent_id' => '19'
            ],
            23 => [
                'id' => '24',
                'title' => '招贤纳士',
                'order' => '1',
                'parent_id' => '0'
            ],
            24 => [
                'id' => '25',
                'title' => '联系我们',
                'order' => '1',
                'parent_id' => '0'
            ],
            25 => [
                'id' => '26',
                'title' => '系统设置',
                'order' => '1',
                'parent_id' => '0'
            ],




        ]);
    }
}
