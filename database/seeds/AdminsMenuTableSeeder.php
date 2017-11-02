<?php

use Illuminate\Database\Seeder;
use Encore\Admin\Auth\Database\Permission;
use Encore\Admin\Auth\Database\Menu;
use Encore\Admin\Auth\Database\Role;
use Encore\Admin\Auth\Database\Administrator;

class AdminsMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create a user.
        Administrator::truncate();
        Administrator::create([
            'username'  => 'admin',
            'password'  => bcrypt('admin'),
            'name'      => 'Administrator',
        ]);

        // create a role.
        Role::truncate();
        Role::create([
            'name'  => 'Administrator',
            'slug'  => 'administrator',
        ]);

        // add role to user.
        Administrator::first()->roles()->save(Role::first());

        //create a permission
        Permission::truncate();
        Permission::insert([
            [
                'name'        => 'All permission',
                'slug'        => '*',
                'http_method' => '',
                'http_path'   => '*',
            ],
            [
                'name'        => 'Dashboard',
                'slug'        => 'dashboard',
                'http_method' => 'GET',
                'http_path'   => '/',
            ],
            [
                'name'        => 'Login',
                'slug'        => 'auth.login',
                'http_method' => '',
                'http_path'   => "/auth/login\r\n/auth/logout",
            ],
            [
                'name'        => 'User setting',
                'slug'        => 'auth.setting',
                'http_method' => 'GET,PUT',
                'http_path'   => '/auth/setting',
            ],
            [
                'name'        => 'Auth management',
                'slug'        => 'auth.management',
                'http_method' => '',
                'http_path'   => "/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs",
            ],
        ]);

        Role::first()->permissions()->save(Permission::first());

        // add default menus.
        Menu::truncate();
        Menu::insert([
            [
                'parent_id' => 0,
                'order'     => 1,
                'title'     => '首页',
                'icon'      => 'fa-bar-chart',
                'uri'       => '/',
            ],
            [
                'parent_id' => 0,
                'order'     => 2,
                'title'     => '后台管理',
                'icon'      => 'fa-tasks',
                'uri'       => '',
            ],
            [
                'parent_id' => 2,
                'order'     => 3,
                'title'     => '用户',
                'icon'      => 'fa-users',
                'uri'       => 'auth/users',
            ],
            [
                'parent_id' => 2,
                'order'     => 4,
                'title'     => '规则',
                'icon'      => 'fa-user',
                'uri'       => 'auth/roles',
            ],
            [
                'parent_id' => 2,
                'order'     => 5,
                'title'     => '权限',
                'icon'      => 'fa-ban',
                'uri'       => 'auth/permissions',
            ],
            [
                'parent_id' => 2,
                'order'     => 6,
                'title'     => '菜单',
                'icon'      => 'fa-bars',
                'uri'       => 'auth/menu',
            ],
            [
                'parent_id' => 2,
                'order'     => 7,
                'title'     => 'Operation log',
                'icon'      => 'fa-history',
                'uri'       => 'auth/logs',
            ],
            [
                'parent_id' => 0,
                'order'     => 7,
                'title'     => '分类管理',
                'icon'      => 'fa-th-large',
                'uri'       => 'categories',
            ],
            [
                'parent_id' => 0,
                'order'     => 7,
                'title'     => '品牌故事',
                'icon'      => 'fa-info-circle',
                'uri'       => '',
            ],
            [
                'parent_id' => 9,
                'order'     => 7,
                'title'     => '品牌介绍',
                'icon'      => 'fa-tasks',
                'uri'       => 'company_introduce',
            ],
            [
                'parent_id' => 9,
                'order'     => 7,
                'title'     => '品牌荣誉',
                'icon'      => 'fa-anchor',
                'uri'       => 'company_honor',
            ],
            [
                'parent_id' => 9,
                'order'     => 7,
                'title'     => '公司愿景',
                'icon'      => 'fa-adn',
                'uri'       => 'company_hope',
            ],
            //id => 13
            [
                'parent_id' => 0,
                'order'     => 7,
                'title'     => '产品中心',
                'icon'      => 'fa-ils',
                'uri'       => '',
            ],
            [
                'parent_id' => 13,
                'order'     => 7,
                'title'     => '航空座椅外套',
                'icon'      => 'fa-adn',
                'uri'       => 'air_seat_jacket',
            ],
            [
                'parent_id' => 13,
                'order'     => 8,
                'title'     => '航空毛毯',
                'icon'      => 'fa-desktop',
                'uri'       => 'aviation_blanket',
            ],
            [
                'parent_id' => 13,
                'order'     => 8,
                'title'     => '无纺布产品',
                'icon'      => 'fa-gg',
                'uri'       => 'non_woven_products',
            ],
            [
                'parent_id' => 13,
                'order'     => 9,
                'title'     => '航空单品',
                'icon'      => 'fa-flickr',
                'uri'       => 'aviation_item',
            ],
            [
                'parent_id' => 13,
                'order'     => 10,
                'title'     => '其他航空单品',
                'icon'      => 'fa-flickr',
                'uri'       => 'aviation_item',
            ],
            [
                'parent_id' => 13,
                'order'     => 10,
                'title'     => '酒店纺织产品',
                'icon'      => 'fa-facebook',
                'uri'       => 'hotel_textile_product',
            ],
            #20
            [
                'parent_id' => 0,
                'order'     => 10,
                'title'     => '新闻中心',
                'icon'      => 'fa-newspaper-o',
                'uri'       => '',
            ],
            [
                'parent_id' => 20,
                'order'     => 1,
                'title'     => '公司动态',
                'icon'      => 'fa-newspaper-o',
                'uri'       => 'company_dynamics',
            ],
            [
                'parent_id' => 20,
                'order'     => 10,
                'title'     => '行业资讯',
                'icon'      => 'fa-newspaper-o',
                'uri'       => 'industry_information',
            ],
            [
                'parent_id' => 20,
                'order'     => 10,
                'title'     => '媒体焦点',
                'icon'      => 'fa-newspaper-o',
                'uri'       => 'focus_media',
            ],
            [
                'parent_id' => 20,
                'order'     => 10,
                'title'     => '通知公告',
                'icon'      => 'fa-newspaper-o',
                'uri'       => 'notice',
            ],
            [
                'parent_id' => 0,
                'order'     => 10,
                'title'     => '招贤纳士',
                'icon'      => 'fa-newspaper-o',
                'uri'       => 'recruit',
            ],
            [
                'parent_id' => 0,
                'order'     => 11,
                'title'     => '联系我们',
                'icon'      => 'fa-cog',
                'uri'       => 'system_info',
            ],

        ]);

        // add role to menu.
        Menu::find(2)->roles()->save(Role::first());
    }
}
