<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Reserva;

class ReservaController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Reserva';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Reserva());

        $grid->column('id', __('Id'));
        $grid->column('nombre', __('Nombre'));
        $grid->column('apellido', __('Apellido'));
        $grid->column('email', __('Email'));
        $grid->column('telefono', __('Telefono'));
        $grid->column('fecha_reserva', __('Fecha reserva'));
        $grid->column('horario_entrada', __('Horario entrada'));
        $grid->column('horario_salida', __('Horario salida'));
        $grid->column('metodo_pago', __('Metodo pago'));
        $grid->column('tipo_vehiculo', __('Tipo vehiculo'));
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
        $show = new Show(Reserva::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nombre', __('Nombre'));
        $show->field('apellido', __('Apellido'));
        $show->field('email', __('Email'));
        $show->field('telefono', __('Telefono'));
        $show->field('fecha_reserva', __('Fecha reserva'));
        $show->field('horario_entrada', __('Horario entrada'));
        $show->field('horario_salida', __('Horario salida'));
        $show->field('metodo_pago', __('Metodo pago'));
        $show->field('tipo_vehiculo', __('Tipo vehiculo'));
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
        $form = new Form(new Reserva());

        $form->text('nombre', __('Nombre'));
        $form->text('apellido', __('Apellido'));
        $form->email('email', __('Email'));
        $form->number('telefono', __('Telefono'));
        $form->date('fecha_reserva', __('Fecha reserva'))->default(date('Y-m-d'));
        $form->datetime('horario_entrada', __('Horario entrada'))->default(date('Y-m-d H:i:s'));
        $form->datetime('horario_salida', __('Horario salida'))->default(date('Y-m-d H:i:s'));
        $form->number('metodo_pago', __('Metodo pago'));
        $form->text('tipo_vehiculo', __('Tipo vehiculo'));

        return $form;
    }
}
