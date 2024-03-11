<div class="modal fade" id="modalEditEmpresa" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header modal-move m-principal">
                <h5 class="modal-title" id="staticBackdropLabel">EDITAR EMPRESA</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="EditEmpresa">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="content-input mb-2">
                                <div class="col-sm-12">
                                    <div class="content-input mb-2">
                                        <input id="nombreEm" name="nombreEm" type="text" class="custom-input material"
                                            placeholder=" " onkeyup="mayus(this.id)" autocomplete="off">
                                        <label class="input-label" for="">Nombre</label>
                                    </div>
                                </div>
                                <input type="hidden" name="idEmpresa" id="idEmpresa" value="">

                                <div class="col-sm-12">
                                    <div class="content-input mb-2">
                                        <input id="direccionEm" name="direccionEm" type="text" class="custom-input material"
                                            placeholder=" "onkeyup="mayus(this.id)" autocomplete="off">
                                        <label class="input-label" for="">Dirección</label>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="content-input">
                                        <input class="custom-input material" name="correoEm" type="text" placeholder=" "
                                            id="correoEm" autocomplete="off">
                                        <label class="input-label" for="">Correo</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="col-sm-12">
                                            <div class="content-input">
                                                <input class="custom-input material" name="celulareEm" type="text" placeholder=" " id="celulareEm" autocomplete="off">
                                                <label class="input-label" for="">Celular</label>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-sm-6">
                                        <div class="col-sm-12">
                                            <div class="content-input">
                                                <input class="custom-input material" name="telefonoEm" type="text" placeholder=" " id="telefonoEm" autocomplete="off">
                                                <label class="input-label" for="">Teléfono</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="content-input">
                                        <input class="custom-input material" name="rubroEm" type="text" placeholder=" "
                                            id="rubroEm" autocomplete="off">
                                        <label class="input-label" for="">Rubro</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Aquí irá solo la imagen -->
                            <div class="col-sm-12 col-md-6">
                                <div class="input-group mb-2">
                                    <input type="text" readonly onclick="loadImagen()" class="form-control input-file" value=""
                                        placeholder="Imagen">
                                    <button class="btn-file" onclick="loadImagen()" type="button"><i
                                            class="bi bi-card-image icon-input"></i></button>
                                </div>
                                <input name="imagen" type="file" id="file_logos" accept="image/jpeg, image/png"
                                    class="d-none d-flex align-items-center justify-content-center" onchange="previewImagen(this)">
                                <div class="card">
                                    <div class="card-body content-preview-img px-2 py-1">
                                        <span class="text-preview-img">Vista previa</span>
                                        <br>
                                        <div style="display: flex; justify-content: center; align-items: center;">
                                            <img id="showImagePreviewn" src="" alt="Cargando..." style="max-width: 100%; max-height: 175px;">
                                        </div>
                                    </div>
                            </div>
                            
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="EditarEmpresa()">Guardar</button>
            </div>
        </div>
    </div>
</div>