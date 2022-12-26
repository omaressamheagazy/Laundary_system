<?php

namespace App\Admin\Controllers;

use App\Models\Car;
use App\Models\RequestStatus;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Symfony\Component\HttpFoundation\RequestStack;

class CarController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Car';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Car());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('user_id', __('User id'));
        $grid->column('model', __('Model'));
        $grid->column('color', __('Color'));
        $grid->column('plate_number', __('Plate number'));
        $grid->column('vehicle_certificate',__('Vehicle certificate'))->image('','100','100');
        $grid->column('licence',__('Licence'))->image('','100','100');
        $grid->column('status_id', 'Status')->display(function ($status) {
            $status = RequestStatus::all()->where('id', $status)->first();
            return "<span class='label label-success'>{$status['name']}</span>";
        });
        $grid->column('status', __('Status'));
        $grid->column('reason', __('Reason'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
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
        $show = new Show(Car::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('user_id', __('User id'));
        $show->field('model', __('Model'));
        $show->field('color', __('Color'));
        $show->field('plate_number', __('Plate number'));
        $show->field('vehicle_certificate', __('Vehicle certificate'));
        $show->field('licence', __('Licence'));
        $show->field('status_id', __('Status'));
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
        $form = new Form(new Car());

        $form->text('name', __('Name'))->readonly();
        $form->text('model', __('Model'))->readonly();
        $form->text('color', __('Color'))->readonly();
        $form->text('plate_number', __('Plate number'))->readonly();
        $form->image('vehicle_certificate', __('Vehicle certificate'))->readonly();
        $form->image('licence', __('Licence'))->readonly();
        // $form->text('status', __('Status'));
        $form->select('status_id','Status')->options(RequestStatus::all()->pluck('name', 'id'));
        $form->textarea('reason', __('Reason'));

        return $form;
    }
}
