<?php

namespace App\Admin\Controllers;

use App\Models\Cooperation;
use App\Models\Category;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class CooperationController extends Controller
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

            $content->header('列表');
            $content->description('合作地区');

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
            $content->description('合作地区');

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

            $content->header('新增');
            $content->description('合作地区');

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
        return Admin::grid(Cooperation::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name('名称');
            $grid->logo('LOGO')->image('', 100, 100);
            $grid->category_id('所属分类')->display(function(){
              $category = Category::find($this->category_id);
              return $category?$category->title:'';
            })->badge('green');
            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Cooperation::class, function (Form $form) {
          $categorySelects = [];
          $categories = Category::where('parent_id', 48)->get();
          foreach ($categories as $key => $category) {
            $categorySelects[$category->id] = $category->title;
          }

            $form->display('id', 'ID');
            $form->select('category_id', '分类')->options($categorySelects)->rules('required');
            $form->text('name', '名称');
            $form->image('logo', '图片')->removable()->uniqueName()->move('/upload/cooperation/image');
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
