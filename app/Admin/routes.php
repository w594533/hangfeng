<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('/categories', 'CategoriesController');
    #产品介绍
    $router->resource('/company_introduce', 'CompanyIntroduceController');
    #产品荣誉
    $router->resource('/company_honor', 'CompanyHonorController');
    #公司愿景
    $router->resource('/company_hope', 'CompanyHopeController');
    #航空座椅
    $router->resource('/air_seat_jacket', 'AirSeatJacketController');
    #航空毛毯
    $router->resource('/aviation_blanket', 'AviationBlanketController');
    #无纺布产品
    $router->resource('/non_woven_products', 'NonWovenProductController');
    #航空单品
    $router->resource('/aviation_item', 'AviationItemController');
    #其他航空单品
    $router->resource('/other_item', 'OtherItemController');
    #酒店纺织产品
    $router->resource('/hotel_textile_product', 'OtherItemController');
    #
    $router->resource('/company_dynamics', 'CompanyDynamicsController');

    $router->resource('/industry_information', 'IndustryInformationController');

    $router->resource('/focus_media', 'IndustryInformationController');

    $router->resource('/notice', 'NoticeController');

    $router->resource('/recruit', 'RecruitController');

    $router->resource('/system_info', 'SystemInfoController');







});
