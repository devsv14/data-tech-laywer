<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursales extends Model
{
    use HasFactory;
    protected $table = 'sucursales'; 
    protected $fillable = [
        'nombre_sucursal',
        'direccion',
        'telefono',
        'celular',
        'encargado',
        'empresa_id',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
