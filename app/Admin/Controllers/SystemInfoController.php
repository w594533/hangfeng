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
            $content->description('描述');

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

            $content->header('header');
            $content->description('description');

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

            $grid->id('ID')->sortable();
            $grid->address('公司地址');
            $grid->phone('总机');
            $grid->facsimile('传真');
            $grid->contract_person('联系人');
            $grid->email('邮箱');
            $grid->image('公司地址定位图')->image();

            $grid->disableCreation();

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

            $form->display('id', 'ID');
            $form->text('address', '公司地址');
            $form->text('phone', '总机');
            $form->text('facsimile', '传真');
            $form->text('contract_person', '联系人');
            $form->image('image', '地址图片')->uniqueName()->move('/upload/system_info/image');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
