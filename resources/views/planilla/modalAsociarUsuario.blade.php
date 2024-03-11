<div class="modal fade" id="agregarusuario" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light" style="padding: 3px 20px !important;">
                <h5 class="modal-title">Agregar Empleado </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="content-input mb-2">
                            <input id="nombreEmpleado" name="nombreEmpleado" type="text"
                                class="custom-input material cls-input-general" value="" placeholder=" "
                                readonly>
                            <label class="input-label" for="">Nombre empleado</label>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="content-input mb-2">
                            <input id="userSeleccionado" name="userSeleccionado" type="text"
                                class="custom-input material cls-input-general" value="" placeholder=" "
                                readonly>
                            <label class="input-label" for="">Usuario seleccionado</label>
                        </div>
                    </div>
                    <div class="col-sm-1">
                    <button type="button" class="btn btn-success" onclick="asociar()"><i class="bi bi-check-circle"></i></button>
                    </div>
                </div>
                <input type="hidden" id="idempleado" name="idempleado" value="">
                <input type="hidden" id="idUsuario" name="idUsuario" value="">

                <div class="card p-2 mb-0">
                    <table class="table-responsive table-hover table-bordered table1 table-custom table-td" style="width:100%"
                    id="AsociarUsuario">
                    <thead class="bg-dark text-light">
                            <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Sucursal</th>
                                <th class="text-center">Agregar</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <!-- Contenido de la tabla -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>