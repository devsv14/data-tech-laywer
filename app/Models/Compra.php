<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model{
    use HasFactory;
    protected $fillable = ['fecha','hora','tipo_comprobante','numero_comprobante','resp_compra','user_compra','monto','impuesto','iva','observaciones','comercio','img_comprobante','sucursal_id','empresa_id'];
    protected $table = 'compras';
}
