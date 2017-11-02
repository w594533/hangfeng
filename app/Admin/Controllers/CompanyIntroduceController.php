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

class CompanyIntroduceController extends Controller
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

            $content->header('品牌介绍');
            $content->description('这是品牌介绍');

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
            $grid->model()->where('category_id', '=', 2);
            $grid->id('ID')->sortable();
            $grid->name('文章标题');
            $grid->cover('文章主图')->display(function(){

                if ($this->cover != ''){
                    $image = config('app.url') . '/storage/' . $this->cover;
                    if(preg_match('/^http:\/\//', $image)) {

                        return '<img src="'. $image . '" width="80"/>';
                    }else{
                        return '暂无图片哦';
                    }

                } else {
                    return "暂无图片哦~";
                }

            });
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
        return Admin::form(Post::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name', '文章标题');
            $form->select('category_id', '所属分类')->options(['2' => '品牌故事']);
            $form->image('cover', '文章主图')->uniqueName()->move('/upload/company_introduce/image');
            $form->editor('slug', '文章内容');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
