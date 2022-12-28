<?php

namespace App\Admin\Controllers;

use App\Models\License;
use App\Models\RequestStatus;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LicenseController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'License';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new License());
        $grid->column('end_date', __('End date'));
        $grid->column('licence',__('Licence'))->image('','100','100');
        $grid->column('status_id', 'Status')->display(function ($status) {
            $status = RequestStatus::all()->where('id', $status)->first();
            return "<span class='label label-success'>{$status['name']}</span>";
        });
        $grid->column('reason', __('Reason'));

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
        $show = new Show(License::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('end_date', __('End date'));
        $show->field('licence', __('Licence'));
        $show->field('status_id', __('Status id'));
        $show->field('reason', __('Reason'));
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
        $form = new Form(new License());

        $form->date('end_date', __('End date'))->default(date('Y-m-d'))->readonly();
        $form->image('licence', __('Licence'))->readonly();
        $form->select('status_id','Status')->options(RequestStatus::all()->pluck('name', 'id'));
        $form->textarea('reason', __('Reason'));

        return $form;
    }
}
