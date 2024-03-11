<div class="modal fade" id="modalAgregarSucursal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header modal-move bg-dark text-light" style="padding: 3px 20px !important;">
                <h5 class="modal-title text-center w-100">Agregar Sucursal a la Empresa <span id="nombreEmpresaSpan"
                        style="color: rgb(127, 140, 154);"></span>
                </h5> <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" id="CrearSuc">
                            <div class="shadow p-3 mb-5 bg-body rounded">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="content-input mb-2">
                                            <input id="nombreSuc" name="nombreSuc" type="text"
                                                class="custom-input material" placeholder=" " onkeyup="mayus(this.id)"
                                                autocomplete="off">
                                            <label class="input-label" for="">Nombre Sucursal</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="content-input mb-2">
                                            <input id="direccionSuc" name="direccionSuc" type="text"
                                                class="custom-input material" placeholder=" " onkeyup="mayus(this.id)"
                                                autocomplete="off">
                                            <label class="input-label" for="">Dirección</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="content-input">
                                            <input class="custom-input material" name="telefono" type="text"
                                                placeholder=" " id="telefono" autocomplete="off">
                                            <label class="input-label" for="">Teléfono</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="idEmpresaS" id="idEmpresaS" value="">
                                    <div class="col-md-4">
                                        <div class="content-input">
                                            <input class="custom-input material" name="celular" type="text"
                                                placeholder=" " id="celular" autocomplete="off">
                                            <label class="input-label" for="">Celular</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="content-input">
                                            <input class="custom-input material" name="encargado" type="text"
                                                placeholder=" " id="encargado" autocomplete="off">
                                            <label class="input-label" for="">Encargado</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" onclick="save_sucursal()">Guardar</button>
                                </div>

                            </div>
                        </form>
                        <div class="shadow p-3 mb-5 bg-body rounded">
                            <table class="table-custom table-responsive table-hover table-bordered" style="width:100%"
                                id="Sucursales">
                                <thead class="bg-dark text-light">
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Direccion</th>
                                        <th class="text-center">Celular</th>
                                        <th class="text-center">Telefono</th>
                                        <th class="text-center">Encargado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <!-- Contenido de la tabla -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- End Disabled Backdrop Modal-->
            </div>
        </div>
    </div>
</div><!-- End Disabled Backdrop Modal-->