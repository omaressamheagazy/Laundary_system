<?php

namespace App\Admin\Controllers;

use App\Models\RequestStatus;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RequestStatusController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */

    protected $title = 'RequestStatus';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new RequestStatus());
        $grid->column('name');


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
        $show = new Show(RequestStatus::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new RequestStatus());
        $form->text('name', __('Name'))->required();
        return $form;
    }
}
