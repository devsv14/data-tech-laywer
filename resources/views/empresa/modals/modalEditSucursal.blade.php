<div class="modal fade" id="modalEditSucursal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header modal-move bg-dark text-light" style="padding: 3px 20px !important;">
                <h5 class="modal-title text-center w-100">Editar Sucursal</h5>
                 <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" id="EditSuc">
                            <div class="shadow p-3 mb-5 bg-body rounded">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="content-input mb-2">
                                            <input id="nombreEdit" name="nombreEdit" type="text"
                                                class="custom-input material" placeholder=" " onkeyup="mayus(this.id)"
                                                autocomplete="off">
                                            <label class="input-label" for="">Nombre Sucursal</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="content-input mb-2">
                                            <input id="direccionEdit" name="direccionEdit" type="text"
                                                class="custom-input material" placeholder=" " onkeyup="mayus(this.id)"
                                                autocomplete="off">
                                            <label class="input-label" for="">Dirección</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="content-input">
                                            <input class="custom-input material" name="telefonoEdit" type="text"
                                                placeholder=" " id="telefonoEdit" autocomplete="off">
                                            <label class="input-label" for="">Teléfono</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_suc" id="id_suc" value="">
                                    <input type="hidden" name="id_emp" id="id_emp" value="">
                                    <div class="col-md-4">
                                        <div class="content-input">
                                            <input class="custom-input material" name="celularEdit" type="text"
                                                placeholder=" " id="celularEdit" autocomplete="off">
                                            <label class="input-label" for="">Celular</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="content-input">
                                            <input class="custom-input material" name="encargadoEdit" type="text"
                                                placeholder=" " id="encargadoEdit" autocomplete="off">
                                            <label class="input-label" for="">Encargado</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" onclick="edit_sucursal()">Actualizar</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div><!-- End Disabled Backdrop Modal-->
            </div>
        </div>
    </div>
</div><!-- End Disabled Backdrop Modal-->