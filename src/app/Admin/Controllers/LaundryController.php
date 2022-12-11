<?php

namespace App\Admin\Controllers;

use App\Models\Laundry;
use Encore\Admin\Controllers\AdminController;
use App\Models\LaundryType;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Symfony\Component\VarDumper\VarDumper;
Use Encore\Admin\Admin;

class LaundryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Laundry';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Laundry());
        $grid->id("ID");
        $grid->name("Name");
        $grid->address("Address");
        $grid->column('image',__('Image'))->image('','100','100');


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
        $show = new Show(Laundry::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Laundry());
        $form->text("name")->rules('required')->required();
        $form->latlong('latitude', 'longitude', 'Position')->rules('required')->height(500);

        $form->textarea("description")->rows(6);
        $form->image('image');
        foreach (LaundryType::all("title") as  $value) {
            $status[]=$value['title'];
        }
        $form->select('status','Status')->options($status)->required();



        return $form;
    }
}
