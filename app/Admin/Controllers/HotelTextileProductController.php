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

class HotelTextileProductController extends Controller
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

            $grid->model()->whereIn('category_id', collect(Category::where('parent_id', '9')->get())->pluck('id')->toArray());
            $grid->id('ID')->sortable();
            $grid->image('配图')->display(function(){
                if (empty($this->image) || is_null($this->image)){
                    return '暂无图片哦';
                }

                $image = config('app.url') . '/storage/' . $this->image;

                return '<img style="width:80px" src="'. $image . '">';
            });

            $grid->description('描述')->badge('green');
            $grid->created_at('发布时间');
            //$grid->updated_at();
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
            $form->select('category_id', '归属')->options(collect(Category::where('parent_id', 9)->get())->pluck('title', 'id'));

            $form->image('image', '图片')->uniqueName()->move('/upload/air_seat_jacket');
            $form->text('description', '描述');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
