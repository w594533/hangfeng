<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('posts')->delete();

        \DB::table('posts')->insert([
            0 => [
                'name'  => '这是品牌介绍',
                'slug'  => '这是品牌介绍的内容咯',
                'cover' => '',
                'category_id' => '2',
            ]
        ]);
    }
}
