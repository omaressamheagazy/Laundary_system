<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderStatus;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('Id'));
        $grid->column('user_id', 'email')->display(function ($id) {
            $user = User::all()->where('id', $id)->first();
            return "<span class='label label-success'>{$user['email']}</span>";
        });

        $grid->column('delivery_id', __('Delivery id'));
        $grid->column('status_id', 'Status')->display(function ($status) {
            $status = OrderStatus::all()->where('id', $status)->first();
            return "<span class='label label-success'>{$status['name']}</span>";
        });
        $grid->column('total_price', __('Total price'));
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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('delivery_id', __('Delivery id'));
        $show->field('status_id', __('Status id'));
        $show->field('total_price', __('Total price'));
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
        $form = new Form(new Order());
        $form->text('user.name')->readonly();
        $form->text('user.email')->readonly();

        $form->select('status_id','Status')->options(OrderStatus::all()->pluck('name', 'id'));
        $form->decimal('total_price', __('Total price'));

        return $form;
    }
}
