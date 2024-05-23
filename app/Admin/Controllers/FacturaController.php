<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use App\Models\Factura;
use App\Models\Reserva;
use App\Models\Paymode;

class FacturaController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Factura';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Factura());

        $grid->column('id', __('ID'));
        $grid->column('numero_factura', __('Número de Factura'));
        $grid->column('fecha_factura', __('Fecha de Factura'));
        $grid->column('nombre_factura', __('Nombre de Facturación'));
        $grid->column('email_factura', __('Email de Facturación'));
        $grid->column('monto', __('Monto'));
        $grid->column('estado', __('Estado'));
        $grid->column('reserva.nombre', __('Reserva'));

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
        $show = new Show(Factura::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('numero_factura', __('Número de Factura'));
        $show->field('fecha_factura', __('Fecha de Factura'));
        $show->field('nombre_factura', __('Nombre de Facturación'));
        $show->field('direccion_factura', __('Dirección de Facturación'));
        $show->field('email_factura', __('Email de Facturación'));
        $show->field('telefono_factura', __('Teléfono de Facturación'));
        $show->field('monto', __('Monto'));
        $show->field('estado', __('Estado'));
        $show->field('reserva.nombre', __('Nombre de la Reserva'));
        $show->field('reserva.apellido', __('Apellido de la Reserva'));
        $show->field('reserva.email', __('Email de la Reserva'));
        $show->field('reserva.telefono', __('Teléfono de la Reserva'));
        $show->field('reserva.fecha_reserva', __('Fecha de Reserva'));
        $show->field('reserva.horario_entrada', __('Horario de Entrada'));
        $show->field('reserva.horario_salida', __('Horario de Salida'));
        $show->field('reserva.tipo_vehiculo', __('Tipo de Vehículo'));
        $show->field('reserva.paymode.Nombre', __('Método de Pago'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Factura());

        $form->text('numero_factura', __('Número de Factura'))->rules('required|unique:facturas');
        $form->date('fecha_factura', __('Fecha de Factura'))->rules('required');
        $form->text('nombre_factura', __('Nombre de Facturación'))->rules('required');
        $form->textarea('direccion_factura', __('Dirección de Facturación'))->rules('required');
        $form->email('email_factura', __('Email de Facturación'))->rules('required|email');
        $form->text('telefono_factura', __('Teléfono de Facturación'))->rules('required');
        $form->decimal('monto', __('Monto'))->rules('required');
        $form->select('estado', __('Estado'))->options(['pending' => 'Pendiente', 'paid' => 'Pagada', 'cancelled' => 'Cancelada'])->default('pending')->rules('required');
        $form->select('reserva_id', __('Reserva'))->options(Reserva::all()->pluck('nombre', 'id'))->rules('required');
        $form->select('paymode_id', __('Método de Pago'))->options(Paymode::all()->pluck('Nombre', 'id'))->rules('required');

        return $form;
    }
}
