<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetCompra extends Model
{
    use HasFactory;
    protected $fillable = ['producto','numero_comprobante','precio_unitario','cantidad','umedida','subtotal','iva','impuestos','categoria_id'];
    protected $table = 'det_compras';
}
