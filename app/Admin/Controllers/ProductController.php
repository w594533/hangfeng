<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use App\Models\Category;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ProductController extends Controller
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

            $content->header('产品列表');
            $content->description('产品列表');

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
            $content->description('编辑');

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
            $content->description('新增');

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
        return Admin::grid(Product::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->name('名称');
            $grid->category_id('所属分类')->display(function(){
                return Category::findOrFail($this->category_id)->title;
            })->badge('green');
            // 显示多图
            $grid->img('图片')->image('', 100, 100);

            // $grid->created_at();
            // $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Product::class, function (Form $form) {

          $categorySelects = [];
          $categories = Category::where('parent_id', 7)->get();
          foreach ($categories as $key => $category) {
            $categorySelects[$category->id] = $category->title;
            //查找子节点
            $childrenCategories = $category->childrenCategories;

            foreach ($childrenCategories as $key_c => $childrenCategory) {
              $categorySelects[$childrenCategory->id] = '|---- '. $childrenCategory->title;
            }
          }


            $form->display('id', 'ID');
            $form->text('name', '名称');
            $form->select('category_id', '分类')->options($categorySelects)->rules('required');
            $form->textarea('detail', '详情')->rows(10)->help('使用Enter键，一行一条');
            $form->multipleImage('img', '图片')->removable()->uniqueName()->move('/upload/products/image');
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
