<?php

use App\Http\Controllers\ComprasController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlanillaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpedientesController;
use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('home')->middleware('auth');
/**
 * Routes para autenticacion en la app
 */
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('login.auth');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/expedientes',[ExpedientesController::class,'index'])->name('expedientes');
///RUTAS PRODUCTO
Route::post('productos/save',[ProductController::class,'createNewProduct'])->name('insert.newproduct')->middleware('auth');

/////RUTAS PARA COMPRAS
Route::get('/compras',[ComprasController::class,'index'])->name('compras.index');
Route::post('compras/categoria/save',[ComprasController::class,'saveCategoriacompra'])->name('insert.catcompra')->middleware('auth');
Route::post('compras/save',[ComprasController::class,'saveCompra'])->name('insert.compra')->middleware('auth');
Route::post('/getCompras',[ComprasController::class,'tablaCompras'])->name('compras-tabla');
Route::get('/obtenerCompra/{id}',[ComprasController::class,'VerCompras'])->name('detcompras');
Route::post('/saveImg',[ComprasController::class,'saveImg'])->name('save.img')->middleware('auth');
//RUTAS PARA DOC COMPRAS
Route::get('/docCompras',[ComprasController::class,'render'])->name('Doccompras.index');
Route::post('/consultaCompras',[ComprasController::class,'comprasRango'])->name('comprasRan.compras');
Route::post('/cardCategoria',[ComprasController::class,'cardCategoria'])->name('categorias.compras');


//RUTAS PARA USERS
Route::get('/users',[UserController::class,'index'])->name('usuario');
Route::post('/guardarUser', [UserController::class, 'SaveUser'])->name('user.save')->middleware('auth');
Route::post('/getUsuarios',[UserController::class,'tablaUsuarios'])->name('usuarios');
Route::get('/obtenerUsuario/{id}',[UserController::class,'EditUsuario'])->name('editUsuario');
Route::post('/ActualizarUser', [UserController::class, 'ActualizarUser'])->name('user.actualizar')->middleware('auth');

//RUTAS PARA EMPRESA
Route::get('empresa', [EmpresaController::class,'index'])->name('empresa');
Route::post('/guardarEmpresa', [EmpresaController::class, 'SaveEmpresa'])->name('empresa.save')->middleware('auth');
Route::post('/getEmpresa',[EmpresaController::class,'tablaEmpresa'])->name('empresa-tabla');
Route::get('/obtenerEmpresa/{id}',[EmpresaController::class,'EditEmpresa'])->name('editEmpresa');
Route::post('/ActualizarEmpresa', [EmpresaController::class, 'ActualizarEmpresa'])->name('empresa.actualizar')->middleware('auth');
Route::post('/getSucursales/{id}', [EmpresaController::class, 'tablaSucursales'])->name('Sucursales.tabla');
Route::post('/CrearSucursal', [EmpresaController::class, 'SaveSucursal'])->name('sucursal.save')->middleware('auth');
Route::get('/obtenerSucursal/{id}',[EmpresaController::class,'EditSucursal'])->name('editSucursal');
Route::post('/ActualizarSucursal', [EmpresaController::class, 'ActualizarSucursal'])->name('sucursal.actualizar')->middleware('auth');

//rutas para planillas
Route::get('/planilla',[PlanillaController::class,'index'])->name('planilla.index');
Route::post('/guardar-empresa-planilla', [PlanillaController::class, 'empresa'])->name('planillas.empresa')->middleware('auth');
Route::post('/guardar-Empleado-planilla', [PlanillaController::class, 'empleado'])->name('planillas.empleado')->middleware('auth');


Route::post('/getPlanillasData/{idEmpresa}', [PlanillaController::class, 'getPlanillasData'])->name('planilla')->middleware('auth');
Route::post('/getPlanillas/{idEmpresa}', [PlanillaController::class, 'getPlanillas'])->name('planilla.planilla')->middleware('auth');
Route::post('/getPlanillaEmpleados/{idEmpresas}', [PlanillaController::class, 'getPlanillasEmpleados'])->name('planilla.nueva')->middleware('auth');
Route::post('/getPlaEmple/{idEmpresas}', [PlanillaController::class, 'getPlanillasEmp'])->name('planilla.EmpleadoPrincipal')->middleware('auth');
Route::post('/ver-empleado', [PlanillaController::class, 'datosEmpleado'])->name('empleado.datos')->middleware('auth');
Route::post('/obtenerdatos-planilla', [PlanillaController::class, 'datos_Empleado_planilla'])->name('datos.empleadoPlanilla')->middleware('auth');
Route::post('/guardarPlanilla', [PlanillaController::class, 'createPlanilla'])->name('planilla.create')->middleware('auth');
Route::post('/asignarUsuario', [PlanillaController::class, 'usuariosPlanilla'])->name('usuarios.planilla')->middleware('auth');
Route::post('/Generarpdfp', [PlanillaController::class, 'GenerarpdfPlanilla'])->name('planilla.pdf')->middleware('auth');
//Route::get('comisiones', [PlanillaController::class, 'render'])->name('comisiones.index')->middleware('auth');
//Route::get('/empleadosComision', [PlanillaController::class, 'comision'])->name('comision.empleado')->middleware('auth');
//Route::post('/obtenertotal-comision', [PlanillaController::class, 'obtenerComision'])->name('comision.usuarios')->middleware('auth');
//Route::post('/GuardarMeta', [PlanillaController::class, 'meta'])->name('meta.sucursal')->middleware('auth');
//Route::get('/Metastable/{idEmpresas}', [PlanillaController::class, 'datosmetas'])->name('datos.metas')->middleware('auth');
//Route::post('/obtenertotal', [PlanillaController::class, 'datosComision'])->name('monto.usuarios')->middleware('auth');
//Route::post('/actualizarid', [PlanillaController::class, 'actualizarId'])->name('actualizar.create')->middleware('auth');
Route::post('/Obtsucursales', [PlanillaController::class, 'sucursales'])->name('sucursales.usuarios')->middleware('auth');
//Route::post('/guardarcomision', [PlanillaController::class, 'createComision'])->name('comision.create')->middleware('auth');
//Route::post('/GenerarpdfpComision', [PlanillaController::class, 'GenerarpdfComision'])->name('comision.pdf')->middleware('auth');
