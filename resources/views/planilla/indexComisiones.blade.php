@extends('layouts.app')
@section('title', 'Comisiones')
@section('page-title', 'MÓDULO DE COMISIONES')
@section('content')
@include('planilla.modalComisionar')

<div class="content-wrapper">
    <div class="content-wrapper">
        <div class="card-header p-0 m-0">
            <div class="content-wrapper">
                <div class="card" style="border-top:4px solid #012970">
                    <div class="card card-warning card-outline mt-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Comisiones de Empleados</h5>
                                <div class="row">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <label class="input-group-title1" for="tipo_pago">Mes: </label>
                                                <select name="mes" id="mes" class="form-select border-radius cls-input-general"
                                                    data-toggle="tooltip" data-placement="bottom" title="Seleccionar mes">
                                                    <option value="">Selecc...</option>
                                                    <option value="1">Enero</option>
                                                    <option value="2">Febrero</option>
                                                    <option value="3">Marzo</option>
                                                    <option value="4">Abril</option>
                                                    <option value="5">Mayo</option>
                                                    <option value="6">Junio</option>
                                                    <option value="7">Julio</option>
                                                    <option value="8">Agosto</option>
                                                    <option value="9">Septiembre</option>
                                                    <option value="10">Octubre</option>
                                                    <option value="11">Noviembre</option>
                                                    <option value="12">Diciembre</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <label class="input-group-title1" for="tipo_pago">Año: </label>
                                                <select name="Years" id="Years" class="form-select border-radius cls-input-general"
                                                    data-toggle="tooltip" data-placement="bottom" title="Seleccionar years">
                                                    <option value="">Selecc...</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024" selected>2024</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 d-flex align-items-center">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="Asesor" name="r1" onclick="inCheckSelected(this)" value="Asesor">
                                                <label for="Asesor">Asesor </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="Optometra" name="r1" onclick="inCheckSelected(this)" value="Optometra">
                                                <label for="Optometra">Optometra</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="Todos" name="r1" onclick="inCheckSelected(this)" value="Todos">
                                                <label for="Todos">Todos</label>
                                            </div>
                                        </div>
                                    
                                    </div>
                                    
                                    <div class="content-wrapper">

                                        <div class="row row-1" style='margin-top:4px'>
                                            <div class="col-md-5">
                                                <div class="card card-default">
                                                    <div class="card-header py-1 my-1">
                                                        <div class="row">

                                                        </div>
                                                    </div><!-- /.card-header -->
                                                    <div class="card-body table-container" style='padding:2px;'>
                                                        <table style="width:100%;" class="table-hover table-bordered"
                                                            id="tabla_comisiones" data-order='[[ 0, "desc" ]]'
                                                            width="100%;">
                                                            <thead class="style_th"
                                                                style="color: white; text-align: center; font-size: 12px; background: #161d31">
                                                                <th style="text-align: center !important">Nombre</th>
                                                                <th style="text-align: center !important">Cargo</th>
                                                                <th style="text-align: center !important">Sucursal</th>
                                                                <th style="text-align: center !important">Accion</th>
                                                            </thead>
                                                            <tbody class="style_th dt-product-bd"
                                                                style='font-size: 13px; text-align: center; padding: 1px'>
                                                            </tbody>
                                                        </table>
                                                    </div><!-- /.card-body -->
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card card-default">
                                                    <div class="card m-1 p-1">
                                                        <div class="row">
                                                            <div class="d-flex justify-content-end">
                                                                <button type="button" onclick="generarComision()" class="btn btn-primary btn-block btn-sm"
                                                                    style="height: 30px;"> GUARDAR<i class="fas fa-save"></i> </button>
                                                            </div>
                                                        </div>
                                                                                                        <!-- /.card-header -->
                                                <div class="card-body table-container" style='padding:2px;'>
                                                   
                                                    <table style="width:100%;" class="table-hover table-bordered"
                                                        data-order='[[ 0, "desc" ]]' width="100%;">
                                                        <thead class="style_th"
                                                            style="color: white; text-align: center; font-size: 12px; background: #161d31">
                                                            <th style="width: 30%">Nombre</th>
                                                            <th style="width: 10%">Ventas</th>
                                                            <th style="width: 10%">ISSS</th>
                                                            <th style="width: 10%">AFP</th>
                                                            <th style="width: 10%">ISR</th>
                                                            <th style="width: 10%">Salario</th>
                                                            <th style="width: 10%">Total</th>
                                                            <th style="width: 10%">Eliminar</th>
                                                        </thead>
                                                        <tbody class="style_th"
                                                            style='font-size: 13px; text-align: center; padding: 1px'
                                                            id="tabla_comisioness">

                                                        </tbody>
                                                        <tfoot style='background: #f4f6f9'>
                                                            <tr>
                                                                <td style="text-align: center" colspan="1"><strong>Monto
                                                                total de comisiones</strong></td>
                                                                <!-- ... -->
                                                                <td style="text-align: center" colspan="1">$<strong
                                                                    id="total_venta"></strong></td>
                                                                <td style="text-align: center" colspan="1">$<strong
                                                                        id="total_seguro"></strong></td>
                                                                <td style="text-align: center" colspan="1">$<strong
                                                                        id="tot_afp"></strong></td>
                                                                <td style="text-align: center" colspan="1">$<strong
                                                                        id="tot_isr"></strong></td>
                                                                <td style="text-align: center" colspan="1">$<strong
                                                                        id="tot_SD"></strong></td>
                                                                <td style="text-align: center" colspan="1">$<strong
                                                                        id="total_Liqu"></strong></td>
                                                                <td></td>
                                                                <!-- ... -->
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                   
                                                </div><!-- /.card-body -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.row-1-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
<script src="{{ asset('js/comision.js')}}?v={{rand()}}"></script>
@endpush
@endsection