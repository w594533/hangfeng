<?php

use Illuminate\Database\Seeder;

class AtlasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('atlases')->delete();

        \DB::table('atlases')->insert([
            0 => [
                'id' => 1,
                'description' => '这是品牌荣誉',
                'image' => 'upload/company_honor/image/a62de832a6d5916983cb1594c4de449d.png',
                'category_id' => '3',
                'created_at' => \Carbon\Carbon::now()
            ],
            1 => [
                'id' => 2,
                'description' => '这是发展愿景',
                'image' => 'upload/company_hope/image/a62de832a6d5916983cb1594c4de449d.png',
                'category_id' => '11',
                'created_at' => \Carbon\Carbon::now()
            ],



        ]);
    }
}
