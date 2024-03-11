<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index()
    {
        /*  $empresa_id = Auth::user()->id_empresa;
      $sucursal_id = Auth::user()->sucursal; */
        return view('users.index');
    }

    public function SaveUser(Request $request)
            {
                $empresa_id = Auth::user()->empresa_id;

                $validator = $request->validate([
                    'nombre' => ['required'],
                    'usuario' => ['required'], // Cambiado a 'unique:users'
                    'contraseña' => 'required',
                    'correo' => 'required', // Validar formato de correo electrónico
                    'telefono' => 'required',
                    'cargo' => 'required',
                    'estado' => 'required',
                    'dui' => 'required',
                ]);
                if ($validator) {
                    // Crear un nuevo usuario
                    $user = User::create([
                        'name' => $request->input('nombre'),
                        'usuario' => $request->input('usuario'),
                        'password' => bcrypt($request->input('contraseña')), // Hash de la contraseña
                        'pass2' => $request->input('contraseña'),
                        'correo' => $request->input('correo'),
                        'telefono' => $request->input('telefono'),
                        'cargo' => $request->input('cargo'),
                        'estado' => $request->input('estado'),
                        'dui' => $request->input('dui'),
                        // Asegúrate de ajustar esto según tus necesidades y relaciones
                        'empresa_id' => $empresa_id,
                        'sucursal_id' => '1',
                    ]);

                    // Puedes realizar otras acciones después de crear el usuario si es necesario
                    return response()->json([
                        'message' => 'Usuario creado correctamente!',
                        'user' => $user, // Opcional: puedes devolver el usuario creado si lo necesitas
                    ]);
                } else {
                    return response()->json([
                        'message' => 'Error en la validación', // Cambiado de 'ERROR!'
                        'errors' => $validator->errors(), // Devolver detalles de errores de validación
                    ], 422); // Código 422 Unprocessable Entity para errores de validación
                }
            }
    public function tablaUsuarios(){
        $empresa_id = Auth::user()->empresa_id;
        $cat = Auth::user()->categoria;

        if ($cat === "1"){
            $usuario = User::All();
        }  else{
            $usuario = User::where('empresa_id',$empresa_id)->get();
        }
        $data = array();
        foreach ($usuario as $usuarios) {
            $sub_array = array();
            $sub_array[] = $usuarios->id;
            $sub_array[] = $usuarios->name;
            $sub_array[] = $usuarios->usuario;
            $sub_array[] = $usuarios->cargo;
            $sub_array[] = $usuarios->estado;
            $sub_array[] = $usuarios->dui;
            $sub_array[] = '<button onclick="edit(' . $usuarios->id . ')" class="btn btn-outline-info btn-sm"><i class="bi bi-person-fill-gear"></i></button>';
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
        public function EditUsuario($id)
            {
                $usuario = User::find($id); // Suponiendo que tu modelo se llama User

                return response()->json($usuario);
            }

        public function ActualizarUser(Request $request){
            $validator = $request->validate([
                'nombreEd' => ['required'],
                'usuarioEd' => ['required'], // Cambiado a 'unique:users'
                'contraseñaEd' => 'required',
                'correoEd' => 'required', // Validar formato de correo electrónico
                'telefonoEd' => 'required',
                'cargoEd' => 'required',
                'estadoEd' => 'required',
                'duiEd' => 'required',
            ]);
            $id = $request->input('idUsuario');
            if ($validator) {

                $usuario = User::find($id);
                $usuario->name = $request->input('nombreEd');
                $usuario->telefono = $request->input('telefonoEd');
                $usuario->dui = $request->input('duiEd');
                $usuario->cargo = $request->input('cargoEd');
                $usuario->correo = $request->input('correoEd');
                $usuario->usuario = $request->input('usuarioEd');
                $usuario->password =  bcrypt($request->input('contraseñaEd'));
                $usuario->estado = $request->input('estadoEd');
                $usuario->pass2 = $request->input('contraseñaEd');
                $usuario->save();

                // Puedes realizar otras acciones después de crear el usuario si es necesario
                return response()->json([
                    'message' => 'Usuario actualizado correctamente!',
                    'user' => $usuario, // Opcional: puedes devolver el usuario creado si lo necesitas
                ]);
            } else {
                return response()->json([
                    'message' => 'Error en la validación', // Cambiado de 'ERROR!'
                    'errors' => $validator->errors(), // Devolver detalles de errores de validación
                ], 422); // Código 422 Unprocessable Entity para errores de validación
            }
        }    
}
