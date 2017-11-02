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

class IndustryInformationController extends Controller
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
        return Admin::grid(Post::class, function (Grid $grid) {
            $grid->model()->where('category_id', 21);
            $grid->id('ID')->sortable();
            $grid->name('标题')->badge('green');
            //$grid->slug('内容');
            $grid->cover('配图')->display(function(){
                if (is_null($this->cover) || empty($this->cover)) {
                    return "暂无图片哦!~";
                }

                $image = config('app.url') . '/storage/' . $this->cover;
                return '<img src="'. $image.'">';
            });
            $grid->category_id('归属')->display(function(){
                return Category::findOrFail($this->category_id)->title;
            });
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
            $form->text('title', '标题');
            $form->editor('slug', '内容');
            $form->image('cover', '配图')->uniqueName()->move('/upload/company_dynamics/image');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
