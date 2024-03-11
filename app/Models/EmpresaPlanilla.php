<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaPlanilla extends Model
{
    use HasFactory;

    protected $table = 'empresa_planilla'; 

    protected $fillable = [
        'nombre_empresa',
        'telefono',
        'direccion',
        'imagen',
        'id_empresa',
    ];
}
