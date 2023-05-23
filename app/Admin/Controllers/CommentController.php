<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Comment;
use App\Models\Articles;
use Encore\Admin\Controllers\AdminController;

class CommentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Comment';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Comment());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('content', __('Content'));
        $grid->column('user', __('User'))->display(function ($record) {
            if (!$record) {
                return "";
            }
            $str = "<a href='/admin/users' target='_blank'>" .$record['name'] . "</a>";
            return $str;
        })->sortable();
        $grid->column('article', __('Articles'))->display(function ($record) {
            if (!$record) {
                return "";
            }
            $str = "<a href='/". $record['slug'] ."' target='_blank'>" .$record['title'] . "</a>";
            return $str;
        })->sortable();
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
        $show = new Show(Comment::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('content', __('Content'));
        $show->field('comment_id', __('Comment id'));
        $show->field('user_id', __('User id'));
        $show->field('article_id', __('Article id'));
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
        $form = new Form(new Comment());

        $form->select('user_id', 'User comment')->options(function ($id) {
            $data = User::find($id);
            if ($data) {
                return [$data->id => $data->name];
            } else {
                return;
            }
        })->ajax('/api/admin/users');

        $form->select('article_id', 'Articles')->options(function ($id) {
            $data = Articles::find($id);
            if ($data) {
                return [$data->id => $data->title];
            } else {
                return;
            }
        })->ajax('/api/admin/articles');

        $form->textarea('content', __('Content'));

        return $form;
    }
}
