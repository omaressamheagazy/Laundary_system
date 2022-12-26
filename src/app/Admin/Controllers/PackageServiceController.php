<?php

namespace App\Admin\Controllers;

use App\Models\Package;
use App\Models\PackageServices;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PackageServiceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'PackageServices';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PackageServices());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('packages.name', 'Package');
        $grid->column('price', __('Price'));

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
        $show = new Show(PackageServices::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('price', __('Price'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PackageServices());

        $form->text('name', __('Name'));
        $form->decimal('price', __('Price'));
        $form->select('package_id','Created For')->options(Package::all()->pluck('name', 'id'));

        return $form;
    }
}
