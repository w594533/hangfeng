<?php

namespace App\Admin\Controllers;

use App\Models\SystemInfo;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class SystemInfoController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('网站信息');
            $content->description('描述');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('编辑');
            $content->description('系统信息');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('新建');
            $content->description('系统信息');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(SystemInfo::class, function (Grid $grid) {
          $grid->disableFilter();
          $grid->disableCreation();
          $grid->disableExport();
          $grid->actions(function ($actions) {
            $actions->disableDelete();
          });
          // $grid->disableActions('delete');

            $grid->id('ID')->sortable();
            $grid->address('公司地址');
            $grid->phone('总机');
            $grid->facsimile('传真');
            $grid->contract_person('联系人');
            $grid->email('邮箱');
            // $grid->image('公司地址定位图')->image('',100);


        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(SystemInfo::class, function (Form $form) {

          $form->tab('联系信息', function ($form) {
            $form->display('id', 'ID');
            $form->text('address', '公司地址');
            $form->text('phone', '总机');
            $form->email('email', '企业邮箱');
            $form->text('facsimile', '传真');
            $form->text('contract_person', '联系人');
            $form->email('hr_email', '招聘邮箱');
          })->tab('关于航丰信息', function ($form){
            $form->editor('about_body', '航丰概况');
            $form->multipleImage('about_show_business_images', '业务展示')->help('多图上传')->removable()->move('/upload/system_info/image');
            $form->multipleImage('about_honor_images', '荣誉资质')->help('多图上传')->removable()->move('/upload/system_info/image');
            $form->text('about_vision_title', '发展愿景标题');
            $form->editor('about_vision_body', '发展愿景内容');
          })->tab('Meta优化', function($form) {
            $form->text("meta_title", '标题');
            $form->text('meta_keywords', '关键词');
            $form->text('meta_description', '描述');
          });


            // $form->image('image', '地址图片')->uniqueName()->move('/upload/system_info/image');
            // $form->display('created_at', 'Created At');
            // $form->display('updated_at', 'Updated At');
        });
    }
}
