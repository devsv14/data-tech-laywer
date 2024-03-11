<?php

namespace App\Http\Controllers;

use App\Models\EmpleadoPlanilla;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\EmpresaPlanilla;
use App\Models\PlanillaPrincipal;
use App\Models\Planillas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PDF;

class PlanillaController extends Controller
{
    public function index()
    {
        $empresa_id = Auth::user()->id_empresa;
        $sucursal_id = Auth::user()->sucursal;
        $empresas = EmpresaPlanilla::where('id_empresa', $empresa_id)->get();
        return view('planilla.index', compact(['empresas']));
    }
    public function empresa(Request $request)
    {
        // Validación de datos si es necesario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'direccion' => 'required',
        ]);
        $empresa_id = Auth::user()->id_empresa;
        $empresa = new EmpresaPlanilla;
        $empresa->nombre_empresa = $request->input('nombre');
        $empresa->telefono = $request->input('telefono');
        $empresa->direccion = $request->input('direccion');
        // Manejo de la imagen (guardarla en storage, base64, etc.)
        if ($request->hasFile('image')) {
            $imagen = $request->file('image');
            $nombre_imagen = time() . '_' . $imagen->getClientOriginalName();
            $ruta_imagen = 'storage/empresa/' . $nombre_imagen; // Ruta donde deseas guardar el archivo
            // Mover y guardar el archivo
            $imagen->move(public_path('storage/empresa'), $nombre_imagen);
            $empresa->imagen = $ruta_imagen; // Guardamos la ruta relativa en la base de datos
        }
        $empresa->id_empresa = $empresa_id;
        $empresa->save();
        // Puedes devolver una respuesta JSON, redirigir o hacer lo que sea necesario
        return response()->json(['message' => 'Empresa guardada exitosamente']);
    }
    public function empleado(Request $request)
    {
        $usuario = Auth::user();
        $id_empresa = $usuario->empresa_id;
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'nameEmp' => 'required',
            'dui' => 'required',
            'isss' => 'required',
            'afp' => 'required',
            'nit' => 'required',
            'cargo' => 'required',
            'fecha_inicio' => 'required',
            'fecha_nacimiento' => 'required',
            'domicilio' => 'required',
            'correo' => 'required',
            'salario_mensual' => 'required',
            'deducciones' => 'required',
            // Agrega más campos aquí según sea necesario
        ]);
        $empresa = $request->input('empresai');

        // Crear una nueva instancia del modelo Planilla (en lugar de usar create)
        $planilla1 = new EmpleadoPlanilla();
        $planilla1->nombre = $request->input('nombre');
        $planilla1->isss = $request->input('isss');
        $planilla1->cargo = $request->input('cargo');
        $planilla1->domicilio = $request->input('domicilio');
        $planilla1->telefono = $request->input('telefono');
        $planilla1->afp = $request->input('afp');
        $planilla1->fecha_ingreso = $request->input('fecha_inicio');
        $planilla1->correo = $request->input('correo');
        $planilla1->dui = $request->input('dui');
        $planilla1->nit = $request->input('nit');
        $planilla1->fecha_nacimiento = $request->input('fecha_nacimiento');
        $planilla1->salario = $request->input('salario_mensual');
        //        $idEmpresaUsuario = $this->obtenerIdEmpresaPorUsuario();
        $planilla1->id_empresa = $id_empresa;
        $planilla1->descuento = $request->input('deducciones');
        $planilla1->empresa_planilla = $request->input('empresai');
        // Guardar la nueva instancia en la base de datos
        $planilla1->save();
        // Después de guardar el empleado...
        $empleadoId = $planilla1->id;  // Obtener el ID del empleado recién creado
        $empleadoNombre = $planilla1->nombre;  // Obtener el nombre del empleado recién creado

        return response()->json(['message' => 'Empleado guardado exitosamente', 'empresa' => $empresa, 'empleadoId' => $empleadoId, 'empleadoNombre' => $empleadoNombre]);
    }

    public function getPlanillasData($idEmpresa)
    {
        $planillas = EmpleadoPlanilla::where('empresa_planilla', $idEmpresa)->get();
        $data = array();
        foreach ($planillas as $planilla) {
            $sub_array = array();
            $sub_array[] = $planilla->id;
            $sub_array[] = $planilla->nombre;
            $sub_array[] = $planilla->cargo;
            $sub_array[] = $planilla->fecha_ingreso;
            $sub_array[] = $planilla->salario;
            $sub_array[] = '<button onclick="AsociarUsuario(' . $planilla->id . ', \'' . $planilla->nombre . '\')" class="btn btn-primary btn-sm"><i class="bi bi-person-plus"></i></button>';
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
    
    public function getPlanillas($idEmpresa)
    {
        $planillas = PlanillaPrincipal::where('id_empresa_planilla', $idEmpresa)->get();
        $data = array();
        foreach ($planillas as $planilla) {
            $sub_array = array();
            $sub_array[] = $planilla->nombre;
            $sub_array[] = $planilla->fecha_desde;
            $sub_array[] = $planilla->fecha_hasta;
            $sub_array[] = '$' . number_format($planilla->isss, 2);
            $sub_array[] = '$' . number_format($planilla->afp, 2);
            $sub_array[] = '$' . number_format($planilla->isr, 2);
            $sub_array[] = '$' . number_format($planilla->t_salario, 2);
            $sub_array[] = '$' . number_format($planilla->total_Neto, 2);
            $sub_array[] = '<button onclick="verEmpleados(' . $planilla->id . ')" class="btn btn-outline-success"><i class="bi bi-folder"></i></button>';
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

    public function getPlanillasEmpleados($idEmpresas)
    {
        $planillas = EmpleadoPlanilla::where('empresa_planilla', $idEmpresas)->get();
        $id_empresa = $idEmpresas;
        $data = array();
        foreach ($planillas as $planilla) {
            $sub_array = array();
            //$sub_array[] = $planilla->id;
            $sub_array[] = $planilla->nombre;
            //$sub_array[] = $planilla->cargo;
            //$sub_array[] = $planilla->fecha_ingreso;
            $sub_array[] = $planilla->salario;
            //$pdfUrl = route('generar.pdf', ['id' => $planilla->id]);
            $sub_array[] = '<button type="button" onclick="OpenPagoModal(\'' . $planilla->id . '\',\'' . $id_empresa . '\')" class="btn btn-md btn-outline-secondary btn-sm shadow-lg" style="border:1px solid #f1f1f1;background:none">
            <i class="fas fa-angle-double-right" aria-hidden="true" style="color:blue"></i>
        </button>';
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
    public function getPlanillasEmp($idPlanilla)
    {
        $planillas = Planillas::where('id_planilla', $idPlanilla)->get();
        $id_empresa = $idPlanilla;
        $data = array();
        foreach ($planillas as $planilla) {
            $sub_array = array();
            $idplanilla = $planilla->id;
            $nombreEmpleado = EmpleadoPlanilla::where('id', $planilla->id_empleado)->value('nombre');
            $sub_array[] = $planilla->id;
            $sub_array[] = $nombreEmpleado;
            $sub_array[] = $planilla->dias_trabajados;
            $sub_array[] = '$' . number_format($planilla->total_devengado, 2);
            $sub_array[] = '$' . number_format($planilla->isss, 2);
            $sub_array[] = '$' . number_format($planilla->afp, 2);
            $sub_array[] = '$' . number_format($planilla->isr, 2);
            $sub_array[] = '$' . number_format($planilla->total_ingresos, 2);
            $sub_array[] = '$' . number_format($planilla->total_descuentos, 2);
            $sub_array[] = '$' . number_format($planilla->total_neto, 2);

            //$pdfUrl = route('generar.pdf', ['id' => $planilla->id]);
            $sub_array[] = '<button type="button" onclick="imprimir(\'' . $idplanilla . '\',\'' . $id_empresa . '\')" class="btn btn-md btn-outline-secondary btn-sm shadow-lg" style="border:1px solid #f1f1f1;background:none">
            <i class="fa-solid fa-download" aria-hidden="true" style="color:blue"></i>
        </button>';

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
    public function datosEmpleado(Request $request)
    {
        $id_empleado = $request->input('idempleado');
        $id_empresa = $request->input('idempresa');
        $datosEmpleado = EmpleadoPlanilla::where('id', $id_empleado)->first();
        $datosEmpresa = EmpresaPlanilla::where('id', $id_empresa)->first();
        // Realizar operaciones con los datos
        $datosEmpleado->salario_quincenal = number_format($datosEmpleado->salario / 2, 2);
        $datosEmpleado->sueldo_diario = number_format($datosEmpleado->salario / 30, 2);
        $datosEmpleado->sueldo_hora = number_format(($datosEmpleado->salario / 30) / 8, 2);
        // Almacenar en la sesión
        session(['empleado' => $datosEmpleado, 'empresa' => $datosEmpresa]);
        // Enviar la respuesta JSON
        return response()->json(['empleado' => $datosEmpleado, 'empresa' => $datosEmpresa]);
    }
    public function datos_Empleado_planilla(Request $request)
    {
        $empleado_id = $request->input('id_empleado');
        $empresa_id = $request->input('id_empresa');

        $datosempleado = EmpleadoPlanilla::where('id', $empleado_id)->first();
        $datosempresa = EmpresaPlanilla::where('id', $empresa_id)->first();

        return response()->json(['empleadoDatos' => $datosempleado, 'empresaDatos' => $datosempresa]);
    }

    public function createPlanilla(Request $request)
    {

        $newPlanilla = new PlanillaPrincipal();
        $newPlanilla->nombre = $request->input('nombre');
        $newPlanilla->fecha_desde = $request->input('inicio');
        $newPlanilla->fecha_hasta = $request->input('final');
        $newPlanilla->t_isss = $request->input('isss');
        $newPlanilla->t_afp = $request->input('afp');
        $newPlanilla->t_isr = $request->input('isr');
        $newPlanilla->t_salario = $request->input('salario');
        $newPlanilla->total_Neto = $request->input('total_neto');
        $newPlanilla->id_empresa_planilla = $request->input('empresa_id');
        $newPlanilla->id_empresa = $request->input('empresa_id');
        $newPlanilla->save();
        $id_planilla = $newPlanilla->id;

        $idEmpleados = [];
        $arrayDatos = json_decode($request->input('datosEmpleado'), true);
        // Guardar datos en la tabla Planillas
        if (isset($arrayDatos) && is_array($arrayDatos)) {
            foreach ($arrayDatos as $datosEmpleado) {
                $PlanillaCreate = new Planillas();
                $PlanillaCreate->id_empresa = $request->input('empresa_id');
                $PlanillaCreate->id_empresa_planilla = $request->input('empresa_id');
                $PlanillaCreate->id_empleado = $datosEmpleado['id_empleado'];
                $PlanillaCreate->id_planilla = $id_planilla;
                $PlanillaCreate->dias_trabajados = $datosEmpleado['diasTrabajados'];
                $PlanillaCreate->sueldo_diario = $datosEmpleado['sueldoDiario'];
                $PlanillaCreate->sueldo_hora = $datosEmpleado['sueldoHora'];
                $PlanillaCreate->salario_base = $datosEmpleado['sueldoBase'];
                $PlanillaCreate->salario_quincenal = $datosEmpleado['sueldoQuincenalfijo'];
                $PlanillaCreate->subtotal_devengado = $datosEmpleado['sueldoQuincenalVariante'];
                $PlanillaCreate->total_devengado = $datosEmpleado['salarioDevengado'];
                $PlanillaCreate->cant_horas = $datosEmpleado['canthoras'];
                $PlanillaCreate->horas_extra = $datosEmpleado['horaExtra'];
                $PlanillaCreate->bonificaciones = $datosEmpleado['bonificaciones'];
                $PlanillaCreate->vacaciones = $datosEmpleado['vacaciones'];
                $PlanillaCreate->isss = $datosEmpleado['isss'];
                $PlanillaCreate->afp = $datosEmpleado['afp'];
                $PlanillaCreate->renta_inponible = $datosEmpleado['salario_inponible'];
                $PlanillaCreate->isr = $datosEmpleado['isr'];
                $PlanillaCreate->otros_desc = $datosEmpleado['otrosDescuentos'];
                $PlanillaCreate->llegadas_tarde = $datosEmpleado['llegadasTarde'];
                $PlanillaCreate->prestamos = $datosEmpleado['prestamos'];
                $PlanillaCreate->dias_injustificados = $datosEmpleado['diasInjustificados'];
                $PlanillaCreate->adelanto_salarial = $datosEmpleado['adelanto'];
                $PlanillaCreate->total_ingresos = $datosEmpleado['total_ingresos'];
                $PlanillaCreate->total_descuentos = $datosEmpleado['total_descuentos'];
                $PlanillaCreate->total_neto = $datosEmpleado['total_neto'];
                // ... (continúa llenando los campos según tu estructura)
                $PlanillaCreate->save();
                $idEmpleados[] = $PlanillaCreate->id;
            }
        }
        return response()->json(['message' => 'Planilla guardada exitosamente', 'planillas creadas para los usuarios con id: ', 'ids_empleado', $idEmpleados, $id_planilla]);
    }


 public function usuariosPlanilla()
 {
     $empresa_id = Auth::user()->empresa_id;
     $usuario = User::where('empresa_id', $empresa_id)->get();
     $data = array();
     foreach ($usuario as $usuarios) {
         $sub_array = array();
         $sub_array[] = $usuarios->name;
         $sub_array[] = $usuarios->cargo;
         $sub_array[] = '<button onclick="asociarusuario(\'' . $usuarios->id . '\',\'' . $usuarios->name . '\')" class="btn btn-outline-success"><i class="bi bi-check2-circle"></i></button> ';
                                                        
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
 public function actualizarId(Request $request)
 {
     $id_user = $request->input('id_usuario');
     $id_empleado = $request->input('id_empleado');
     // Actualizar el modelo Empleado
     $empleado = EmpleadoPlanilla::find($id_empleado);
 
     if ($empleado) {
         // Verificar si el empleado existe
 
         if ($empleado->id_usuario) {
             // El empleado ya tiene un usuario asignado
             return response()->json(['message' => 'El empleado ya tiene un usuario asignado'], 400);
         }
 
         $empleado->id_usuario = $id_user;
         $empleado->save();
 
         return response()->json(['message' => 'Agregado exitosamente']);
     } else {
         return response()->json(['message' => 'Empleado no encontrado'], 404);
     }
 }

 public function GenerarpdfPlanilla(Request $request)
 {
     $idsEmpleados = $request->input('idsEmpleados');

     // Convertir $idsEmpleados a un array si es un solo ID (string)
     $idsEmpleadosArray = is_array($idsEmpleados) ? $idsEmpleados : [$idsEmpleados];

     // Obtener datos necesarios de la solicitud
     $planillaId = $request->input('planilla_id');

     // Verificar si estamos tratando con un solo empleado
     if (count($idsEmpleadosArray) == 1) {
         // Si es un solo empleado, obtenemos los datos directamente sin la necesidad de usar implode
         $empleados = DB::select(
             "SELECT 
             planillas.id AS id_pla,
             planillas.*,
             empresa_planilla.*,
             empleados_planilla.nombre,
             empleados_planilla.telefono,
             empleados_planilla.dui,
             empleados_planilla.cargo,
             empleados_planilla.domicilio,
             empleados_planilla.correo,
             empleados_planilla.salario,
             empleados_planilla.descuento,
             empleados_planilla.empresa_planilla,
             empleados_planilla.id_empresa
         FROM planillas
         JOIN empresa_planilla ON planillas.id_empresa_planilla = empresa_planilla.id
         JOIN empleados_planilla ON planillas.id_empleado = empleados_planilla.id
         WHERE planillas.id = ?",
             [$idsEmpleadosArray[0]]
         );
     } else {
         // Si son múltiples empleados, utilizamos implode como antes
         $empleados = DB::select("SELECT 
             planillas.id AS id_pla,
             planillas.*,
             empresa_planilla.*,
             empleados_planilla.nombre,
             empleados_planilla.telefono,
             empleados_planilla.dui,
             empleados_planilla.cargo,
             empleados_planilla.domicilio,
             empleados_planilla.correo,
             empleados_planilla.salario,
             empleados_planilla.descuento,
             empleados_planilla.empresa_planilla,
             empleados_planilla.id_empresa
         FROM planillas
         JOIN empresa_planilla ON planillas.id_empresa_planilla = empresa_planilla.id
         JOIN empleados_planilla ON planillas.id_empleado = empleados_planilla.id
         WHERE planillas.id IN (" . implode(',', $idsEmpleadosArray) . ")");
     }

     // Verificar si se obtuvieron datos
     if (count($empleados) > 0) {
         // Obtener otros datos necesarios, si es necesario
         $planilla = PlanillaPrincipal::find($planillaId);

         // Generar el contenido del PDF
         $pdf = PDF::loadView('planilla-pdf', compact('planilla', 'empleados'));

         // Devolver el PDF como respuesta
         return $pdf->stream('Planilla.pdf');
     } else {
         // Si no se encontraron datos, devolver una respuesta adecuada (puedes ajustar esto según tus necesidades)
         return response()->json(['error' => 'No se encontraron datos para el empleado solicitado'], 404);
     }
 }

}
