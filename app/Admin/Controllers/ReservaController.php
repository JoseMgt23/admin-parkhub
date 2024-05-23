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

        $grid->column('id', __('ID'));
        $grid->column('nombre', __('Nombre'));
        $grid->column('apellido', __('Apellido'));
        $grid->column('email', __('Email'));
        $grid->column('telefono', __('Teléfono'));
        $grid->column('fecha_reserva', __('Fecha de Reserva'));
        $grid->column('horario_entrada', __('Horario de Entrada'));
        $grid->column('horario_salida', __('Horario de Salida'));
        $grid->column('tipo_vehiculo', __('Tipo de Vehículo'));
        $grid->column('paymode.Nombre', __('Método de Pago')); // Si hay una relación con Paymode

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

        $show->field('id', __('ID'));
        $show->field('nombre', __('Nombre'));
        $show->field('apellido', __('Apellido'));
        $show->field('email', __('Email'));
        $show->field('telefono', __('Teléfono'));
        $show->field('fecha_reserva', __('Fecha de Reserva'));
        $show->field('horario_entrada', __('Horario de Entrada'));
        $show->field('horario_salida', __('Horario de Salida'));
        $show->field('tipo_vehiculo', __('Tipo de Vehículo'));
        $show->field('paymode.Nombre', __('Método de Pago')); // Si hay una relación con Paymode

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

        $form->text('nombre', __('Nombre'))->rules('required');
        $form->text('apellido', __('Apellido'))->rules('required');
        $form->email('email', __('Email'))->rules('required|email');
        $form->text('telefono', __('Teléfono'))->rules('required');
        $form->date('fecha_reserva', __('Fecha de Reserva'))->rules('required');
        $form->datetime('horario_entrada', __('Horario de Entrada'))->rules('required');
        $form->datetime('horario_salida', __('Horario de Salida'))->rules('required');
        $form->text('tipo_vehiculo', __('Tipo de Vehículo'))->rules('required');
        $form->select('paymode_id', __('Método de Pago'))->options(\App\Models\Paymode::all()->pluck('Nombre', 'id'))->rules('required'); // Si hay una relación con Paymode

        return $form;
    }
}
