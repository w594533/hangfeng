<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Product::class, function (Faker $faker) {

    $images = array(
      'product1.jpg',
      'product2.jpg',
      'product3.jpg',
      'product4.jpg'
    );
    $new_images = array();
    foreach ($images as $key => $image) {
      $new_filename = md5($key.rand(0,10000).time());
      Storage::copy($image, '/public/upload/products/image/'.$new_filename.'.jpg');
      $new_images[] = 'upload/products/image/'.$new_filename.'.jpg';
    }
    $date_time = $faker->date . ' ' . $faker->time;
    $detail = array(
      '"面料":"100%棉"',
      '"指示参数":"圆柱形枕头,拉链,上下底部镶边"',
      '"颜色类别":"米色/咖啡色"',
      '"尺寸":"45*25cm"',
      '"安全类别":"安全"'
    );
    return [
        'name' => str_random(5),
        'img' => $new_images,
        'detail' => $detail,
        'created_at' => $date_time,
        'updated_at' => $date_time
    ];
});

$factory->define(App\Models\Cooperation::class, function (Faker $faker) {

    $images = array(
      'partner1.jpg',
      'partner2.jpg',
      'partner3.jpg',
      'partner4.jpg',
      'partner5.jpg',
      'partner6.jpg',
    );
    $new_images = array();
    $new_filename = md5(rand(0,999).rand(0,10000).time());
    Storage::copy($images[mt_rand(0, 5)], '/public/upload/cooperation/image/'.$new_filename.'.jpg');
    $new_images = 'upload/cooperation/image/'.$new_filename.'.jpg';
    $date_time = $faker->date . ' ' . $faker->time;
    return [
        'name' => str_random(5),
        'logo' => $new_images,
        'created_at' => $date_time,
        'updated_at' => $date_time
    ];
});

#新闻
$factory->define(App\Models\Post::class, function (Faker $faker) {

    $images = array(
      'news1.jpg',
      'news2.jpg',
      'news3.jpg',
      'news4.jpg',
      'news5.jpg',
      'news6.jpg',
    );
    $new_images = array();
    $new_filename = md5(rand(0,999).rand(0,10000).time());
    Storage::copy($images[mt_rand(0, 5)], '/public/upload/posts/image/'.$new_filename.'.jpg');
    $new_images = 'upload/posts/image/'.$new_filename.'.jpg';
    $date_time = $faker->date . ' ' . $faker->time;
    return [
        'name' => $faker->sentence(mt_rand(3, 10)),
        'cover' => $new_images,
        'slug' => $faker->text(),
        'created_at' => $date_time,
        'updated_at' => $date_time
    ];
});
