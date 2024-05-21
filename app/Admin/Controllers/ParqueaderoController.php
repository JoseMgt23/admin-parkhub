<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Parqueadero;

class ParqueaderoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Parqueadero';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Parqueadero());

        $grid->column('id', __('Id'));
        $grid->column('nombre', __('Nombre'));
        $grid->column('direccion', __('Direccion'));
        // $grid->column('image', __('Image'));
        $grid->column('image')->image();
        $grid->column('descripcion', __('Descripcion'));
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
        $show = new Show(Parqueadero::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nombre', __('Nombre'));
        $show->field('direccion', __('Direccion'));
        $show->field('image', __('Image'));
        $show->field('descripcion', __('Descripcion'));
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
        $form = new Form(new Parqueadero());

        $form->text('nombre', __('Nombre'));
        $form->text('direccion', __('Direccion'));
        $form->image('image', __('Image'));
        $form->text('descripcion', __('Descripcion'));

        return $form;
    }
}
