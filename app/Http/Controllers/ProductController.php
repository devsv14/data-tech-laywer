<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller{
    
    public function createNewProduct(){
        $producto =  request()->input('producto');
        $categoria =  request()->input('categoria');
        $perecedero =  request()->input('perecedero');
        $stock_min =  request()->input('stock_min');



        try {
            $productoNuevo = Product::create([
                'producto' => strtoupper($producto),
                'categoria_id' => $categoria,
                'perecedero' => $perecedero,
                'rotacion_rapida' => '-',
                'control_stock_min' => $stock_min,
                'usuario_id' => 1,
                'empresa_id' => 1,
                'sucursal_id' => 1,
            ]);
        
            return response()->json([
                'msj'=>'OkInsert',
                'id'=>$productoNuevo->id
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'producto'=>$producto,
                'categoria'=>$categoria,
                'perecedero'=>$perecedero,
                'msj'=>$e->getMessage()
            ]);
        }


      

    }

}
