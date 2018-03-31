<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Post;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class RecruitController extends Controller
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

            $content->header('列表');
            $content->description('招贤纳士');

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
            $content->description('招贤纳士');

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
        return Admin::grid(Post::class, function (Grid $grid) {
            $grid->model()->where('category_id', 24);
            $grid->id('ID')->sortable();
            $grid->name('职位名称');
            $grid->category_id('归属')->display(function(){
              $category = Category::findOrFail($this->category_id);
              return $category?$category->title:'';
            })->badge('green');
            $grid->created_at('创建时间');
            $grid->updated_at('发布时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Post::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name', '职位名称');
            $form->editor('slug', '职位描述');
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
            $form->saving(function(Form $form){
                $form->category_id = '24';
            });
        });
    }
}
