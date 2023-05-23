<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Category';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category());

        $grid->column('id', __('Id'));
        $grid->column('image', __('Image'))->display(function ($record) {
            return "<a class='img-thumbnail' target='_blank' href='" . config('app.link') . $record . "'><img width='60' src='" . config('app.link') . $record . "' /></a>";
        });
        $grid->column('name', __('Name'))->editable()->sortable();
        $grid->column('slug', __('Slug'))->sortable();
        $grid->column('description', __('Description'))->display(function ($record) {
            return substr($record, 0, 40) . "...";
        });
        $grid->column('created_at', __('Created at'))->sortable()->filter('range', 'datetime');
        $grid->column('updated_at', __('Updated at'))->sortable()->filter('range', 'datetime');

        $grid->quickSearch('name');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Category::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('slug', __('Slug'));
        $show->field('description', __('Description'));
        $show->field('image', __('Image'));
        $show->field('deleted_at', __('Deleted at'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Category());

        $form->text('name', __('Name'))->rules('required');
        $form->image('image', __('Image'))->rules('required|image')->move("categories")->uniqueName();
        $form->textarea('description', __('Description'))->rules('required');

        return $form;
    }
}
