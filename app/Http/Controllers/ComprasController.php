<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\DetCompra;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Svg\Tag\Rect;

class ComprasController extends Controller
{
    public function index(){
        $options = DB::select("select *FROM categoria_compras"); 
        $productos =  DB::select("select *FROM productos"); 
        return view('compras.index',compact('options','productos'));
    }

    public function saveCategoriacompra(){
        $categoria = trim(request()->input('categoria'));
        try {
            $catId = DB::table('categoria_compras')->insertGetId([
                'nombre' => strtoupper($categoria)
            ]);
            
            return response()->json([
                'msg' => 'success',
                'id' => $catId
            ]); 
        } catch (\Exception $e) {
            return response()->json([
                'msg' => $e->getMessage()
            ]);
        }
           
    }

    public function saveCompra(){
        $dataItemsCompra = json_decode(request()->input('data-items-compra'),true);
        date_default_timezone_set('America/El_Salvador');
        $hoy = date("Y-m-d");
        $hora = date('H:i:s');
        $impuestos_act = 0.00;
        $impuestosTotal = floatval(request()->input('impuestos-total'));
        if (isset($impuestosTotal) && !empty($impuestosTotal) && is_numeric($impuestosTotal)) {
            $impuestos_act = floatval($impuestosTotal)/count($dataItemsCompra);           
        }
        $codeRandom = sprintf("%02d", mt_rand(0, 99));
        $codTimeMis = Carbon::now()->milliseconds;
        $correlativo = Auth()->user()->sucursal_id.$codeRandom.substr($codTimeMis,-2).'-'.request()->input('comprobante-compra');
        $existeCorrelativo = Compra::where('numero_comprobante', $correlativo)->exists();

        if ($existeCorrelativo) {
            return response()->json([
                'msjInsert'=>'error',
                'msjAlert'=>'Correlativo ya se encuentra en uso!'
            ]);
        }else
        try{
            $totales = request()->input('monto-total')+request()->input('impuestos-total')+request()->input('iva');
            $compra = Compra::create([                
                'fecha'=>$hoy,
                'hora'=>$hora,
                'tipo_comprobante'=>request()->input('tipo_comprobante'),
                'numero_comprobante'=>$correlativo,
                'resp_compra'=>request()->input('resp-compra'),
                'user_compra'=>Auth()->user()->id,
                'monto'=>$totales,
                'impuesto'=>request()->input('impuestos-total'),
                'iva'=>request()->input('iva'),
                'observaciones'=>request()->input('obs-compra'),
                'comercio'=>request()->input('name-vendedor-compra'),
                'img_comprobante'=>'0',
                'sucursal_id'=>Auth()->user()->sucursal_id,
                'empresa_id'=>Auth()->user()->empresa_id
            ]);
            $sumaSubtotales = 0;
            $addProducts = [];
            foreach ($dataItemsCompra as $item) {
               $subtotal = $item['cantItemC'] * $item['precioItemC'];
               $prod = trim($item['descItemC']);
               $existeProducto = Product::where('producto', 'LIKE', '%' . $prod . '%')->exists();          
               if (!$existeProducto) {
                $productoNuevo = Product::create([
                    'producto' => strtoupper($prod),
                    'categoria_id' => $item['idCategoria'],
                    'perecedero' => '',
                    'rotacion_rapida' => '-',
                    'control_stock_min' => '',
                    'usuario_id' => Auth()->user()->id,
                    'empresa_id' => Auth()->user()->empresa_id,
                    'sucursal_id' => Auth()->user()->sucursal_id,
                ]);  
                      
                $addProducts[] = $productoNuevo->producto;
               }
               $detCompra = DetCompra::create([
                'producto'=>strtoupper($prod),
                'numero_comprobante'=>$correlativo,
                'precio_unitario'=>round($item['precioItemC'],2),
                'cantidad'=>$item['cantItemC'],
                'umedida'=>$item['umedida'],///renombrar column
                'subtotal'=>round($subtotal,2),
                'iva'=>round($item['ivaItem'],2),
                'impuestos'=>$impuestos_act,
                'categoria_id'=>$item['idCategoria']
               ]);
               $sumaSubtotales += $subtotal;
            }

            return response()->json([
                'msjInsert'=>'insert',
                'msjAlert'=>'Se ha registrado una compra por el monto de: '.$sumaSubtotales,
                'productos'=>$addProducts
            ]);
           
        }catch (\Exception $e) {
            echo $e->getMessage();
        }
        /* return response()->json([
            'desc'=>$dataItemsCompra[0]['descItemC'],
            'monto'=>request()->input('monto')
        ]); */
    }
    public function tablaCompras(){
        $empresa_id = Auth::user()->empresa_id;
        $compra = Compra::where('empresa_id', $empresa_id)->get();

        $data = array();
        foreach ($compra as $compras) {
            $sub_array = array();
            $sub_array[] = $compras->id;
            $sub_array[] = $compras->tipo_comprobante;
            $sub_array[] = substr($compras->numero_comprobante, strpos($compras->numero_comprobante,'-')+1);
/*             $sub_array[] = '<img src="' . asset($compras->logo) . '" alt="Logo" style="max-width: 50px; max-height: 50px;">';
 */         
            $sub_array[] =  ucwords($compras->comercio);
            $sub_array[] = "$" . number_format($compras->monto,2,'.',',');
            $color = ($compras->img_comprobante === '0') ? 'red' : '#25D322';
            $function = ($compras->img_comprobante === '0') ? 'AgregarComprobante' : 'imagenExiste';
            $sub_array[] = '<i onclick=" ' . $function . '(' . $compras->id . ')" class="bi bi-images" style="cursor: pointer; font-size: 22px; color: ' . $color . ';"></i>';
            $sub_array[] = '<i onclick="DetallesCompras(' . $compras->id . ')" class="bi bi-cash-coin" style="cursor: pointer; font-size: 22px; color: blue;"></i>';

            $data[] = $sub_array;
        }
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        return response()->json($results);


    }
    public function VerCompras($id)
    {
        $compra = Compra::find($id); // Suponiendo que tu modelo se llama User
        $num_compr = $compra->numero_comprobante;
        $detalle = DetCompra::where("numero_comprobante",$num_compr)->get();

        return response()->json(['compra' => $compra, 'detalle' => $detalle,]);
    }


    public function saveImg(Request $request){
        $idCompra = $request->input('id');

        if ($request->hasFile('image')) {
            $logo = $request->file('image');
            $nombreLogo = time() . '_' . $logo->getClientOriginalName();
            $rutaLogo = 'storage/compra/' . $nombreLogo; // Ajusta la ruta según tu necesidad
            // Mueve y guarda el archivo
            $logo->move(public_path('storage/compra'), $nombreLogo);
        
            Compra::where('id', $idCompra)->update(['img_comprobante' => $rutaLogo]);
            // Realiza las acciones necesarias con la imagen y el ID
        }
        
        return response()->json(['img'=> $rutaLogo, 'id'=>$idCompra]);

    }

    //DOCUMENTOS DE COMPRAS 
    public function render(){
        $options = DB::select("SELECT *FROM categoria_compras"); 
        $productos =  DB::select("SELECT *FROM productos"); 
        return view('compras.indexDoc',compact('options','productos'));
    }

    public function comprasRango(Request $request){
        // Obtener las fechas del cuerpo de la solicitud
        $empresa_id = Auth::user()->empresa_id;
        $startDate = Carbon::createFromFormat('d/m/Y', $request->input('startDate'))->format('Y-m-d');
        $endDate = Carbon::createFromFormat('d/m/Y', $request->input('endDate'))->format('Y-m-d');
    
        // Realizar la consulta con las fechas recibidas
        $monto = DB::select("SELECT SUM(monto) as total FROM compras WHERE fecha BETWEEN ? AND ? AND empresa_id = ? ", [$startDate, $endDate, $empresa_id]);

        // Devolver una respuesta, por ejemplo, un JSON
        return response()->json(['monto' => $monto ,'empresa' => $empresa_id]);
    }
    public function cardCategoria(Request $request){
        $empresa_id = Auth::user()->empresa_id;
        $startDate = Carbon::createFromFormat('d/m/Y', $request->input('startDate'))->format('Y-m-d');
        $endDate = Carbon::createFromFormat('d/m/Y', $request->input('endDate'))->format('Y-m-d');
        
        $target = DB::select("SELECT
        ca.nombre AS categoria,
        SUM(dc.iva + dc.subtotal) AS suma_total
        FROM compras AS c INNER JOIN
        det_compras AS dc ON dc.numero_comprobante = c.numero_comprobante INNER JOIN
        categoria_compras AS ca ON ca.id = dc.categoria_id WHERE c.fecha BETWEEN ? AND ? AND c.empresa_id = ? GROUP BY ca.nombre;", [$startDate, $endDate, $empresa_id]);

        return response()->json(['target' => $target ,'empresa' => $empresa_id]);

    }

}
