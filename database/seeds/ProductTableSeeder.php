<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      #产品
      $category_ids = [28, 29, 30, 31];
      foreach ($category_ids as $key => $category_id) {
        $products = factory('App\Models\Product', rand(1,4))->create([
          'category_id' => $category_id,
        ]);
      }
    }
}
