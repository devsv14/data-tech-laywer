<div class="modal fade" id="AgregarEmpleado" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" style="max-width: 65%">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style='background:#232629; color:white'>
                <h4 class="modal-title w-100 text-center" style="font-size: 16px;">PAGO AL EMPLEADO &nbsp;&nbsp; <i
                        style="cursor: pointer;" class="fas fa-id-card-alt" data-toggle="tooltip"
                        data-placement="bottom" title="Botón para modificar los datos del paciente"></i></h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" id="">
                <div class="card p-1 m-0">
                    <div class="card-header my-1 py-1">
                        <div class="card px-1 py-2 shadow-lg">
                            <h5 style="font-size: 12px;text-align:center;font-weight:700">DETALLES </h5>
                            <table class="tableempleado">
                                <thead>
                                    <tr style="background-color: #034f84;font-size:12px;color:white;text-align: center">
                                        <th style="border:1px solid #f2f2f2">Nombre</th>
                                        <th style="border:1px solid #f2f2f2">Empresa</th>
                                        <th style="border:1px solid #f2f2f2">Cargo</th>
                                        <th style="border:1px solid #f2f2f2">Salario</th>
                                        <th style="border:1px solid #f2f2f2">S/Quincenal</th>
                                        <th style="border:1px solid #f2f2f2">S/Diario</th>
                                        <th style="border:1px solid #f2f2f2">S/Hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card p-1 m-0">
                        <div class="row">
                            <h5 style="font-size: 12px;text-align:center;font-weight:700">DETALLES DEL NUEVO PAGO</h5>
                            <div class="col-md-12">
                                <div class="row" enctype="multipart/form-data">
                                    <div class="col-md-4">
                                        <div class="content-input mb-3">
                                            <input type="text" id="Dtrabajados" class="custom-input " value=" "
                                                placeholder=" " onkeyup="mayus(this.id)" autocomplete="off"
                                                name="Dtrabajados" required >
                                            <label class="input-label" for="Dtrabajados">Dias Trabajados</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="content-input mb-3">
                                            <input type="text" id="hextras" class="custom-input" value=""
                                                placeholder=" " onkeyup="mayus(this.id)" autocomplete="off"
                                                name="hextras">
                                            <label class="input-label" for="hextras">Horas Extra</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="content-input mb-3">
                                            <input type="text" id="bonificaciones" class="custom-input" value=""
                                                placeholder=" " name="bonificaciones">
                                            <label class="input-label" for="bonificaciones">Bonificaciones</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="content-input mb-3">
                                            <input type="text" id="vacaciones" name="vacaciones" class="custom-input"
                                                value="" placeholder=" " onkeyup="mayus(this.id)">
                                            <label class="input-label" for="vacaciones">Vacaciones</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="content-input mb-3">
                                            <input type="text" id="prestamos" class="custom-input" name="prestamos"
                                                value="" placeholder=" " onkeyup="mayus(this.id)">
                                            <label class="input-label" for="prestamos">Prestamos</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="content-input mb-3">
                                            <input type="text" id="llegadasTarde" class="custom-input"
                                                name="llegadasTarde" value="" placeholder=" " onkeyup="mayus(this.id)">
                                            <label class="input-label" for="llegadasTarde">Llegadas tarde</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="content-input mb-3">
                                            <input type="text" id="diasInjustificados" class="custom-input"
                                                name="diasInjustificados" value="" placeholder=" "
                                                onkeyup="mayus(this.id)">
                                            <label class="input-label" for="diasInjustificados">Dias
                                                Injustificados</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="content-input mb-3">
                                            <input type="text" id="Otros_descuentos" class="custom-input"
                                                name="Otros_descuentos" value="" placeholder=" "
                                                onkeyup="mayus(this.id)">
                                            <label class="input-label" for="Otros_descuentos">Otros descuentos</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="content-input mb-3">
                                            <input type="text" id="AdelantoSalarial" class="custom-input"
                                                name="AdelantoSalarial" value="" placeholder=" "
                                                onkeyup="mayus(this.id)">
                                            <label class="input-label" for="AdelantoSalarial">Adelanto Salarial</label>
                                        </div>
                                    </div>

                                    <input type="hidden" id="empleado" name="empleadoid">
                                    <input type="hidden" id="empresa" name="empresaid">


                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-outline-primary" 
                                        onclick="agregar()">Agregar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Fin Modal body -->
    </div>

</div>