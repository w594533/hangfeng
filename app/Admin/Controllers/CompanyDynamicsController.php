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

class CompanyDynamicsController extends Controller
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
            $content->description('公司动态');

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
            $content->description('公司动态');

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
            $content->description('公司动态');

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
            $grid->model()->where('category_id', 20);
            $grid->id('ID')->sortable();
            $grid->name('标题');
            //$grid->slug('内容');

            $grid->cover('配图')->display(function ($cover) {
                if (empty($cover) || is_null($cover)) {
                    return '暂无图片';
                }
                $imges = explode(',', $cover);
                return $imges;
            })->image('',100);

            $grid->category_id('归属')->display(function(){
              $category = Category::find($this->category_id);
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
            $form->text('category_id', '归属')->default('公司动态');
            $form->text('name', '标题');
            $form->editor('slug', '内容');
            $form->image('cover', '配图')->removable()->uniqueName()->move('/upload/company_dynamics/image');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');

            $form->saving(function(Form $form){
                $form->category_id = '20';
            });
        });
    }
}
