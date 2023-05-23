<?php

namespace App\Admin\Controllers;

use App\Models\Tag;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Articles;
use App\Models\Category;
use Encore\Admin\Controllers\AdminController;

class ArticlesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Articles';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Articles());

        $grid->column('id', __('Id'));
        $grid->column('image', __('Image'))->display(function ($record) {
            return "<a class='img-thumbnail' target='_blank' href='" . config('app.link') . $record . "'><img width='60' src='" . config('app.link') . $record . "' /></a>";
        });
        $grid->column('title', __('Title'))->display(function ($record) {
            if (!$record) {
                return "";
            }
            $str = "<a href='/". $this->slug ."' target='_blank'>" . html_entity_decode($record, ENT_QUOTES, 'UTF-8') . "</a>";
            return html_entity_decode($str, ENT_QUOTES, 'UTF-8');
        })->filter('like')->sortable();
        // $grid->column('description', __('Description'))->display(function ($record) {
        //     return substr($record, 0, 40) . "...";
        // })->filter('like')->sortable();
        $grid->column('view', __('View'))->sortable();
        $grid->column('category.name', 'Category')->display(function ($record) {
            if (!$record) {
                return "null";
            }
            $str = "<a href='/admin/categories' target='_blank'>" . html_entity_decode($record, ENT_QUOTES, 'UTF-8') . "</a>";
            return html_entity_decode($str, ENT_QUOTES, 'UTF-8');
        });
        $grid->column('user.name', 'User')->display(function ($record) {
            if (!$record) {
                return "null";
            }
            $str = "<a href='/admin/users' target='_blank'>" . html_entity_decode($record, ENT_QUOTES, 'UTF-8') . "</a>";
            return $str;
        });
        $state = [
            'on' => ['value' => 0, 'text' => 'Off', 'color' => 'danger'],
            'off' => ['value' => 1, 'text' => 'On', 'color' => 'success'],
        ];
        $grid->column('status', __('Status'))->switch($state);
        // $grid->column('tags', 'Tags')->display(function ($record) {
        //     if (!$record) {
        //         return '';
        //     }
        //     $str = "";
        //     foreach($record as $value){
        //         $str .= "<div><span class='me-1 bg-info badge text-dark'>" . $value['name'] . "</span></div>";
        //     }
        //     return $str;
        // });
        $grid->column('created_at', __('Created at'))->sortable()->filter('range', 'datetime');
        $grid->column('updated_at', __('Updated at'))->sortable()->filter('range', 'datetime');

        $grid->quickSearch('title');

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
        $show = new Show(Articles::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('slug', __('Slug'));
        $show->field('description', __('Description'));
        $show->field('content', __('Content'));
        $show->field('view', __('View'));
        $show->field('image', __('Image'));
        $show->field('category_id', __('Category id'));
        $show->field('user_id', __('User id'));
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
        $form = new Form(new Articles());

        $form->text('title', __('Title'))->rules('required');
        $form->image('image', __('Image'))->rules('required|image')->move("articles")->uniqueName();

        $form->select('category_id', __('Category'))->options(Category::all()->pluck('name', 'id'))->rules('required');

        $form->multipleSelect('tags', 'Tags')->options(function ($id) {
            $tags = Tag::find($id);
            $arr = [];
            if ($tags) {
                foreach ($tags as $tag) {
                    $arr += [$tag->id => $tag->name];
                }
                return $arr;
            } else {
                return;
            }
        })->ajax('/api/admin/tags');

        $form->hidden('user_id')->default(1);
        $form->hidden('status')->default(1);

        $form->textarea('description', __('Description'))->rules('required');
        $form->summernote('content', __('Content'))->rules('required');
        // $form->daterangepicker(['created_at', 'updated_at'], 'Date range');

        return $form;
    }
}
