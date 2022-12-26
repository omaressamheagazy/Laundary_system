<?php

namespace App\Admin\Controllers;

use App\Models\Package;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PackageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Package';
    private $price = 0;

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Package());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        // $grid->column('services.name');
        $grid->column('services', 'Services')->display(function ($services) {
            $servicesName = [];
            foreach ($services as $service) {
                $servicesName[] = "<span class='label label-success'>{$service['name']}</span>";
                echo $service['price'];
                $this->price += $service['price'];
            }
            return join('&nbsp;', $servicesName);
        });

        $grid->column('Price')->display(function () {
            return "<span class='label label-warning'>{$this->price}</span>";
        });

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
        $show = new Show(Package::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('services', __('Services'));
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
        $form = new Form(new Package());

        $form->text('name', __('Name'));

        return $form;
    }
}
