<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planillas extends Model
{
    use HasFactory;

    protected $table = 'planillas'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'id_empresa',
        'id_empresa_planilla',
        'id_empleado',
        'id_planilla',
        'dias_trabajados',
        'sueldo_diario',
        'sueldo_hora',
        'salario_base',
        'salario_quincenal',
        'subtotal_devengado',
        'total_devengado',
        'cant_horas',
        'horas_extra',
        'bonificaciones',
        'vacaciones',
        'isss',
        'afp',
        'renta_inponible',
        'isr',
        'otros_desc',
        'llegadas_tarde',
        'prestamos',
        'dias_injustificados',
        'adelanto_salarial',
        'total_ingresos',
        'total_descuentos',
        'total_neto',
    ];

    // Puedes agregar relaciones con otros modelos aquí si es necesario
}
