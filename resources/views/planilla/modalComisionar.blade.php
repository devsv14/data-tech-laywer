<style>
    .hidden {
        display: none;
    }
</style>
<div class="modal fade" id="MComision" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark  text-light" style="padding: 3px 20px !important;">
                <h4 class="modal-title text-light" style="font-size: 14px;">CALCULO DE COMISION
                </h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <!-- Modal body -->
            <form id="formComision" method="POST">
                @csrf
                <input type="hidden" name="usuario" id="usuario">
                <input type="hidden" name="descuento" id="descuento">

                <div class="modal-body">
                    <div class="modal-body p-0">
                        <div class="col-md-12">
                            <div class="card p-1 m-1" style="width: 100%">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <label class="input-group-title1" for="tipo_pago">Sucursal: </label>
                                            <select name="sucursal" id="sucursal"
                                                class="form-select border-radius  cls-input-general"
                                                data-toggle="tooltip" data-placement="bottom"
                                                title="Seleccionar Sucursal" disabled>
                                                <option value="">Selecc...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="content-input mb-2">
                                            <input id="montoInput" name="monto" type="text"
                                                class="custom-input material cls-input-general" value="" placeholder=" "
                                                readonly>
                                            <label class="input-label" for="">Monto:</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-5">
                                        <div class="content-input mb-2">
                                            <input id="rangoInput" readonly="" name="rangoInput" type="text"
                                                class="custom-input material cls-input-general" value=""
                                                placeholder=" ">
                                            <label class="input-label" for="">Metas:</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="content-input mb-2">
                                            <input id="nombreUsuario" name="nombreUsuario" type="text"
                                                class="custom-input material cls-input-general" value="" placeholder=" "
                                                readonly>
                                            <label class="input-label" for="">Empleado:</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="content-input mb-2">
                                            <input id="salario" name="salario" type="text"
                                                class="custom-input material cls-input-general" value="" placeholder=" "
                                                readonly>
                                            <label class="input-label" for="">Salario:</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="content-input mb-2">
                                            <input id="user" name="user" type="text"
                                                class="custom-input material cls-input-general" value="" placeholder=" "
                                                readonly>
                                            <label class="input-label" for="">Usuario:</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input clear-input" type="checkbox" id="flexSwitch">
                            <label class="form-check-label clear-input" for="flexSwitch">
                                <span id="comisionText">comisionar</span>
                            </label>
                        </div>

                        <div class="card shadow-md p-2 m-0 seccion-comision" style="width: 100%">
                            <div class="card shadow-md p-2 m-0">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-12 d-flex justify-content-center align-items-center">
                                            <strong>Comision: &nbsp; </strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="card p-1 m-1" style="width: 100%">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <label class="input-group-title1" for="tipo_pago">Calcular por:
                                                </label>
                                                <select class="form-select border-radius  cls-input-general"
                                                    data-toggle="tooltip" data-placement="bottom"
                                                    title="Seleccionar Sucursal" name="cargo" id="calculoPor"
                                                    onchange="seleccionarAccion()">
                                                    <option value="">Selecc...</option>
                                                    <option value="VENTAS">VENTAS</option>
                                                    {{-- <option value="CONSULTAS">CONSULTAS</option>
                                                    --}} <option value="CONSULTAS+VENTAS">CONSULTAS + VENTAS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="content-input mb-2">
                                                <input id="total" readonly="" name="total" type="text"
                                                    class="custom-input material cls-input-general" value=""
                                                    placeholder=" ">
                                                <label class="input-label" for="">Total</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="content-input mb-2">
                                                <input id="porcentaje" name="porcentaje" type="text"
                                                    class="custom-input material cls-input-general" value=""
                                                    placeholder=" ">
                                                <label class="input-label" for="">%</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="content-input mb-2">
                                                <input id="comisionsd" readonly="" name="comisionsd" type="text"
                                                    class="custom-input material cls-input-general" value=""
                                                    placeholder=" ">
                                                <label class="input-label" for="">Comision S/D</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-wrapper">
                                    <div class="row row-1" style='margin-top:4px'>
                                        <div class="col-md-12">
                                            <div class="card card-default">
                                                <div class="card-header py-1 my-1">
                                                    <div class="row">
                                                    </div>
                                                </div><!-- /.card-header -->
                                                <div class="card-body table-container" style='padding:2px;'>
                                                    <div class="module">
                                                        <div
                                                            class="col-md-12 d-flex justify-content-center align-items-center">
                                                            <strong>Descuentos: &nbsp; </strong>
                                                        </div>
                                                        <div class="row justify-content-center">
                                                            <div class="col-md-3">
                                                                <div class="form-check text-center">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="flexCheckDefault1" value="isr"
                                                                        name="descuento">
                                                                    <label class="form-check-label"
                                                                        for="flexCheckDefault1">ISR</label>
                                                                    <div class="content-input mb-2 hidden" id="input1">
                                                                        <input id="isr" name="isr" type="text"
                                                                            class="custom-input material cls-input-general"
                                                                            value="" placeholder=" ">
                                                                        <label class="input-label" for="">Total</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-check text-center">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="flexCheckDefault2" value="isss"
                                                                        name="descuento">
                                                                    <label class="form-check-label"
                                                                        for="flexCheckDefault2">ISSS</label>
                                                                    <div class="content-input mb-2 hidden" id="input2">
                                                                        <input id="isss" name="isss" type="text"
                                                                            class="custom-input material cls-input-general"
                                                                            value="" placeholder=" ">
                                                                        <label class="input-label" for="">Total</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-check text-center">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="flexCheckDefault3" value="afp"
                                                                        name="descuento">
                                                                    <label class="form-check-label"
                                                                        for="flexCheckDefault3">AFP</label>
                                                                    <div class="content-input mb-2 hidden" id="input3">
                                                                        <input id="afp" name="afp" type="text"
                                                                            class="custom-input material cls-input-general"
                                                                            value="" placeholder=" ">
                                                                        <label class="input-label" for="">Total</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- /.card-body -->

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card p-1 m-1" style="width: 100%">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div
                                                            class="col-md-12 d-flex justify-content-center align-items-center">
                                                            <strong>Total: &nbsp; </strong>
                                                        </div>
                                                        <div class="card p-1 m-1" style="width: 100%">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="content-input mb-2">
                                                                        <input id="bono" name="bono" type="text"
                                                                            class="custom-input material cls-input-general"
                                                                            value="" placeholder=" ">
                                                                        <label class="input-label" for="">Bonos
                                                                            Extra</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="content-input mb-2">
                                                                        <input id="totalLiquido" readonly=""
                                                                            name="totalLiquido" type="text"
                                                                            class="custom-input material cls-input-general"
                                                                            value="" placeholder=" ">
                                                                        <label class="input-label" for="">Total</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>

                                            <!-- /.card-header -->
                                            <div class="card-body table-container" style='padding:2px;'>



                                            </div><!-- /.card-body -->


                                        </div>
                                    </div>
                                </div><!-- /.row-1-->
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" onclick="crearComision()" class="btn btn-primary btn-block btn-sm"
                                    style="height: 30px;"> AGREGAR <i class="fa-solid fa-plus"></i> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!--FIN MODAL ABONO--->
<!-- /.modal -->