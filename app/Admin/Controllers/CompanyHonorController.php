<?php

namespace App\Admin\Controllers;

use App\Models\Atlas;
use App\Models\Category;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class CompanyHonorController extends Controller
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

            $content->header('header');
            $content->description('description');

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

            $content->header('header');
            $content->description('description');

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
        return Admin::grid(Atlas::class, function (Grid $grid) {
            $grid->model()->where('category_id', '3');
            $grid->id('ID')->sortable();
            $grid->image('配图')->display(function(){
                if ($this->image != ''){
                    $image = config('app.url') . '/storage/' . $this->image;
                    if(preg_match('/^http:\/\//', $image)) {

                        return '<img src="'. $image . '" width="80"/>';
                    }

                } else {
                    return "暂无图片哦~";
                }

            });
            $grid->description('描述');
            $grid->category_id('所属分类')->display(function(){
                return Category::findOrFail($this->category_id)->title;
            })->badge('green');
            $grid->created_at('创建时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Atlas::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->display('category_id', '归属')->default('公司荣誉');
            $form->text('description', '描述');
            $form->image('image', '配图')->uniqueName()->move('/upload/company_honor/image');
            $form->display('created_at', '发布时间');
            $form->display('updated_at', '更新时间');

            $form->saving(function(Form $form){
               $form->category_id =  3;
            });
        });
    }
}
