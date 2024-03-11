<div class="modal fade" id="MCrearPlanilla" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl" style="max-width: 85%">
        <div class="modal-content">
            <div class="modal-header bg-dark  text-light" style="padding: 3px 20px !important;">
                <h4 class="modal-title text-light" style="font-size: 14px;" id="titleModalTratamientos">NUEVA PLANILLA
                </h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <!-- Modal body -->
            <form id="formplanilla" method="POST">
                @csrf
                <input type="hidden" name="_method" id="_methodTratamientos">
                <input type="hidden" name="empresa_id" id="empresa_id">
                <input type="hidden" name="nombre_sucursal" id="nombre_sucursal">
                <input type="hidden" name="empresa_id" id="empresa_id"> <!-- Reemplaza 123 con el valor real -->

                <div class="modal-body">
                    <div class="modal-body p-0">
                        <div class="card shadow-md p-2 m-0">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-center align-items-center">
                                        <strong>Planilla: &nbsp; </strong>
                                        <strong id="nombre_paciente"> </strong>
                                    </div>
                                </div>
                            </div>
                            <div class="card p-1 m-1" style="width: 100%">
                                <div class="row">
                                    {{-- <div class="col-sm-12 col-md-4 col-lg-3 my-2">

                                        <div class="row">
                                            <div class="col-md-6 d-flex justify-content-center align-items-center">
                                                <strong>Tipo de venta: </strong>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" name="tipoVenta" id="credito" class="chk-invent"
                                                        value="Credito">
                                                    <label for="credito">Crédito</label>
                                                </div>
                                                <div class="icheck-info d-inline" style="margin: 6px;">
                                                    <input type="radio" name="tipoVenta" id="contado" class="chk-invent"
                                                        value="Contado">
                                                    <label for="contado">Contado</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-sm-12 col-md-4 col-lg-3 my-2">
                                        <div class="content-input mb-3">
                                            <input id="nombre1" name="nombre1" type="text" class="custom-inpt" value="" placeholder=" " required>
                                            <label class="input-label" for="">Nombre Planilla</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3 my-2 hide-input">
                                        <div class="content-input">
                                            <input id="inicio_credito" name="inicio_credito" type="date" class="custom-inpt" value="" placeholder=" " required>
                                            <label class="input-label" for="">Periodo Desde</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3 my-2 hide-input">
                                        <div class="content-input">
                                            
                                            <input id="final_credito" name="final_credito" type="date" class="custom-inpt" value="" placeholder=" " required>
                                            <label class="input-label" for="">Periodo Hasta</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3 my-2">
                                        <div class="content-input mb-3">
                                            <input type="text" class="custom-inpt" placeholder=""
                                                name="nameEmpresa" onkeyup="mayus(this.id)" id="nameEmpresa" readonly>
                                            <label class="input-label" for="">Empresa</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span>EMPLEADOS</span>

                            <div class="content-wrapper">

                                <div class="row row-1" style='margin-top:4px'>
                                    <div class="col-md-4">
                                        <div class="card card-default">
                                            <div class="card-header py-1 my-1">
                                                <div class="row">

                                                </div>
                                            </div><!-- /.card-header -->
                                            <div class="card-body table-container" style='padding:2px;'>
                                                <table style="width:100%;" class="table-hover table-bordered"
                                                    id="tabla_planilla" data-order='[[ 0, "desc" ]]' width="100%;">
                                                    <thead class="style_th"
                                                        style="color: white; text-align: center; font-size: 12px; background: #161d31">
                                                        <th style="text-align: center !important">Nombre</th>
                                                        <th style="text-align: center !important">Salario</th>
                                                        <th style="text-align: center !important">*</th>
                                                    </thead>
                                                    <tbody class="style_th dt-product-bd"
                                                        style='font-size: 13px; text-align: center; padding: 1px'>
                                                    </tbody>
                                                </table>
                                            </div><!-- /.card-body -->
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card card-default">
                                            <div class="card-header p-1 m-1">
                                                <div class="row">

                                                </div>
                                            </div>
                                        </div>

                                        <!-- /.card-header -->
                                        <div class="card-body table-container" style='padding:2px;'>
                                            <table style="width:100%;" class="table-hover table-bordered"
                                               data-order='[[ 0, "desc" ]]' width="100%;">
                                                <thead class="style_th"
                                                    style="color: white; text-align: center; font-size: 12px; background: #161d31">
                                                    <th style="width: 30%">Nombre</th>
                                                    <th style="width: 10%">ISSS</th>
                                                    <th style="width: 10%">AFP</th>
                                                    <th style="width: 10%">ISR</th>
                                                    <th style="width: 10%">Salario</th>
                                                    <th style="width: 20%">Total</th>
                                                    <th style="width: 10%">Eliminar</th>
                                                </thead>
                                                <tbody class="style_th"
                                                    style='font-size: 13px; text-align: center; padding: 1px'
                                                    id="tabla_detalles_planilla">
                                                
                                                </tbody>
                                                <tfoot style='background: #f4f6f9'>
                                                    <tr>
                                                        <td style="text-align: center" colspan="1"><strong>Monto total
                                                                de la planilla</strong></td>
                                                       <!-- ... -->
                                                        <td style="text-align: center" colspan="1">$<strong id="total_iss"></strong></td>
                                                        <td style="text-align: center" colspan="1">$<strong id="total_afp"></strong></td>
                                                        <td style="text-align: center" colspan="1">$<strong id="total_isr"></strong></td>
                                                        <td style="text-align: center" colspan="1">$<strong id="total_salario"></strong></td>
                                                        <td style="text-align: center" colspan="1">$<strong id="total_neto"></strong></td>
                                                        <td></td>
                                                        <!-- ... -->
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div><!-- /.card-body -->


                                    </div>
                                </div>
                            </div><!-- /.row-1-->
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" onclick="generarPlanilla()" class="btn btn-primary btn-block btn-sm"
                                style="height: 30px;"> GUARDAR <i class="fas fa-save"></i> </button>
                        </div>
                    </div>
                </div>

        </div>

        </form>
    </div>
</div>
</div>
<!--FIN MODAL ABONO--->
<!-- /.modal -->