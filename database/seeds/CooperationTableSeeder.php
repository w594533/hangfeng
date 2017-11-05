<?php

use Illuminate\Database\Seeder;

class CooperationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      #产品
      $category_ids = [49, 50, 51, 52, 53, 54, 55];
      foreach ($category_ids as $key => $category_id) {
        $products = factory('App\Models\Cooperation', rand(1,4))->create([
          'category_id' => $category_id,
        ]);
      }
    }
}
