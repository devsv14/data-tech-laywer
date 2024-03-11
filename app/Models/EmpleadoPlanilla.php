<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoPlanilla extends Model
{
    use HasFactory;
    protected $table = 'empleados_planilla'; 
    protected $casts = [
        'salario' => 'decimal:2', // Ajusta según tu necesidad
    ];
    protected $fillable = [
        'nombre',
        'telefono',
        'dui',
        'isss',
        'afp',
        'nit',
        'cargo',
        'fecha_ingreso',
        'fecha_nacimiento',
        'domicilio',
        'correo',
        'salario',
        'descuento',
        'empresa_planilla',
        'id_empresa',
        'id_usuario'
    ];
}
