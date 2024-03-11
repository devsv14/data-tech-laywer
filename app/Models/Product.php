<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    use HasFactory;
    protected $fillable = ['producto','categoria_id','perecedero','rotacion_rapida','control_stock_min','usuario_id','empresa_id','sucursal_id'];
    protected $table = 'productos';
}
