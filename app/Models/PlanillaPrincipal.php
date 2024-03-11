<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanillaPrincipal extends Model
{
    use HasFactory;

    protected $table = 'planilla_principal';

    protected $fillable = [
        'id_empresa',
        'id_empresa_planilla',
        'nombre',
        'fecha_desde',
        'fecha_hasta',
        't_isss',
        't_afp',
        't_isr',
        't_salario',
        'total_Neto',
    ];

}
