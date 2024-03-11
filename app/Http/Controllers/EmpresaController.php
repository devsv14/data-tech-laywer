<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Sucursales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class EmpresaController extends Controller
{
    public function index()
    {
        /*  $empresa_id = Auth::user()->id_empresa;
      $sucursal_id = Auth::user()->sucursal; */
      
        return view('empresa.index');
    }
    public function saveEmpresa(Request $request)
    {
        $validate = $request->validate([
            'nombre' => ['required'],
            'direccion' => ['required'],
            'celularempresa' => ['required'],
            'correo' => ['required'],
            'telefonoempresa' => ['required'],
            'rubro' => ['required'],
            'image' => ['required'],
        ]);

        if ($validate) {
            $empresa = new Empresa();

            // Procesa y guarda la imagen si está presente
            if ($request->hasFile('image')) {
                $logo = $request->file('image');
                $nombreLogo = time() . '_' . $logo->getClientOriginalName();
                $rutaLogo = 'storage/empresa/' . $nombreLogo; // Ajusta la ruta según tu necesidad
                // Mueve y guarda el archivo
                $logo->move(public_path('storage/empresa'), $nombreLogo);
                // Guarda la URL de la imagen en el modelo
                $empresa->logo = $rutaLogo;
            }

            // Completa los demás campos del modelo
            $empresa->nombre = $request->input('nombre');
            $empresa->direccion = $request->input('direccion');
            $empresa->correo = $request->input('correo');
            $empresa->celular = $request->input('celularempresa');
            $empresa->telefono = $request->input('telefonoempresa');
            $empresa->rubro = $request->input('rubro');

            // Guarda el modelo en la base de datos
            $empresa->save();

            // Puedes realizar otras acciones después de crear la empresa si es necesario

            return response()->json([
                'message' => 'Empresa creada correctamente!',
                'empresa' => $empresa,
            ]);
        } else {
            return response()->json([
                'message' => 'Error en la validación',
                'errors' => $validate->errors(),
            ], 422);
        }
    }
    public function tablaEmpresa()
    {
        $empresa_id = Auth::user()->empresa_id;
        $categoria = Auth::user()->categoria;
        if ($categoria === '1') {
            $empresa = Empresa::All();
        } elseif ($categoria !== 1) {
            $empresa = Empresa::where('id', $empresa_id)->get();
        }

        $data = array();
        foreach ($empresa as $empresas) {
            $sub_array = array();
            $sub_array[] = $empresas->id;
            $sub_array[] = $empresas->nombre;
            $sub_array[] = '<img src="' . asset($empresas->logo) . '" alt="Logo" style="max-width: 50px; max-height: 50px;">';
            $sub_array[] = $empresas->direccion;
            $sub_array[] = $empresas->celular;
            $sub_array[] = $empresas->correo;
            $sub_array[] = $empresas->telefono;
            $sub_array[] = $empresas->rubro;
            $sub_array[] = '<button onclick="edit(' . $empresas->id . ')" class="btn btn-outline-info btn-xl"><i class="bi bi-building-fill-gear"></i></button>' . ' ' . '<button onclick="CrearSuc(' . $empresas->id . ')" class="btn btn-outline-warning btn-xl"><i class="bi bi-house-add-fill"></i></button>';
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
    public function EditEmpresa($id)
    {
        $usuario = Empresa::find($id); // Suponiendo que tu modelo se llama User

        return response()->json($usuario);
    }

    public function ActualizarEmpresa(Request $request)
    {

        $validate = $request->validate([
            'nombreEm' => ['required'],
            'direccionEm' => ['required'],
            'correoEm' => ['required'],
            'celulareEm' => ['required'],
            'telefonoEm' => ['required'],
            'rubroEm' => ['required'],
        ]);
        $id = $request->input('idEmpresa');
        if ($validate) {
            $empresa = Empresa::find($id);

            // Procesa y guarda la imagen si está presente
            if ($request->hasFile('imagen')) {
                $logo = $request->file('imagen');
                $nombreLogo = time() . '_' . $logo->getClientOriginalName();
                $rutaLogo = 'storage/empresa/' . $nombreLogo; // Ajusta la ruta según tu necesidad
                // Mueve y guarda el archivo
                $logo->move(public_path('storage/empresa'), $nombreLogo);
                // Guarda la URL de la imagen en el modelo
                $empresa->logo = $rutaLogo;
            }

            // Completa los demás campos del modelo
            $empresa->nombre = $request->input('nombreEm');
            $empresa->direccion = $request->input('direccionEm');
            $empresa->correo = $request->input('correoEm');
            $empresa->celular = $request->input('celulareEm');
            $empresa->telefono = $request->input('telefonoEm');
            $empresa->rubro = $request->input('rubroEm');

            // Guarda el modelo en la base de datos
            $empresa->save();

            // Puedes realizar otras acciones después de crear la empresa si es necesario

            return response()->json([
                'message' => 'Empresa creada correctamente!',
                'empresa' => $empresa,
            ]);
        } else {
            return response()->json([
                'message' => 'Error en la validación',
                'errors' => $validate->errors(),
            ], 422);
        }
    }
    public function tablaSucursales($id)
    {

        $sucursales = Sucursales::where('empresa_id', $id)->get();
        $data = array();
        foreach ($sucursales as $sucursal) {
            $sub_array = array();
            $sub_array[] = $sucursal->id;
            $sub_array[] = $sucursal->nombre_sucursal;
            $sub_array[] = $sucursal->direccion;
            $sub_array[] = $sucursal->celular;
            $sub_array[] = $sucursal->telefono;
            $sub_array[] = $sucursal->encargado;
            $sub_array[] = '<button onclick="editSuc(' . $sucursal->id . ')" class="btn btn-outline-info btn-xl"><i class="bi bi-building-fill-gear"></i></button>';
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
    public function SaveSucursal(Request $request)
    {
        $id = $request->input('idEmpresaS');
        $validator = $request->validate([
            'nombreSuc' => ['required'],
            'direccionSuc' => ['required'],
            'telefono' => ['required'],
            'celular' => ['required'],
            'encargado' => ['required'],

        ]);
        if ($validator) {
            $Sucursal = new Sucursales();
            $Sucursal->nombre_sucursal = $request->input('nombreSuc');
            $Sucursal->direccion = $request->input('direccionSuc');
            $Sucursal->telefono = $request->input('telefono');
            $Sucursal->celular = $request->input('celular');
            $Sucursal->encargado = $request->input('encargado');
            $Sucursal->empresa_id = $request->input('idEmpresaS');
            $Sucursal->save();

            // Puedes realizar otras acciones después de crear el usuario si es necesario
            return response()->json([
                'message' => 'Sucursal creada correctamente!',
                'user' => $Sucursal, // Opcional: puedes devolver el usuario creado si lo necesitas
                'id' => $id,

            ]);
        } else {
            return response()->json([
                'message' => 'Error en la validación', // Cambiado de 'ERROR!'
                'errors' => $validator->errors(), // Devolver detalles de errores de validación
            ], 422); // Código 422 Unprocessable Entity para errores de validación
        }
    }
    public function EditSucursal($id)
    {
        $sucursal = Sucursales::find($id);

        return response()->json($sucursal);
    }
    public function ActualizarSucursal(Request $request){

        $validate = $request->validate([
            'nombreEdit' => ['required'],
            'direccionEdit' => ['required'],
            'telefonoEdit' => ['required'],
            'celularEdit' => ['required'],
            'encargadoEdit' => ['required'],
        ]);
        $id = $request->input('id_suc');
        $id_emp = $request->input('id_emp');
        if ($validate) {
            $sucursal = Sucursales::find($id);

            // Completa los demás campos del modelo
            $sucursal->nombre_sucursal = $request->input('nombreEdit');
            $sucursal->direccion = $request->input('direccionEdit');
            $sucursal->celular = $request->input('celularEdit');
            $sucursal->telefono = $request->input('telefonoEdit');
            $sucursal->encargado = $request->input('encargadoEdit');
            // Guarda el modelo en la base de datos
            $sucursal->save();
            $id = $sucursal->id;
            // Puedes realizar otras acciones después de crear la empresa si es necesario
    
            return response()->json([
                'message' => 'sucursal guardada correctamente!',
                'id' => $id_emp,
            ]);
        } else {
            return response()->json([
                'message' => 'Error en la validación',
                'errors' => $validate->errors(),
            ], 422);
        }
        
}
}
