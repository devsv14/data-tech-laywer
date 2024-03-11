<div class="modal fade" id="modalCrearEmpresa" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header modal-move m-principal">
                <h5 class="modal-title" id="staticBackdropLabel">CREAR EMPRESA</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="FormEmpresa">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="content-input mb-2">
                                <div class="col-sm-12">
                                    <div class="content-input mb-2">
                                        <input id="nombre" name="nombre" type="text" class="custom-input material"
                                            placeholder=" " onkeyup="mayus(this.id)" autocomplete="off">
                                        <label class="input-label" for="">Nombre</label>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="content-input mb-2">
                                        <input id="direccion" name="direccion" type="text" class="custom-input material"
                                            placeholder=" " onkeyup="mayus(this.id)" autocomplete="off">
                                        <label class="input-label" for="">Dirección</label>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="content-input">
                                        <input class="custom-input material" name="correo" type="text" placeholder=" "
                                            id="correo" autocomplete="off">
                                        <label class="input-label" for="">Correo</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="col-sm-12">
                                            <div class="content-input">
                                                <input class="custom-input material" name="celularempresa" type="text"
                                                    placeholder=" " id="celularempresa" autocomplete="off">
                                                <label class="input-label" for="">Celular</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="col-sm-12">
                                            <div class="content-input">
                                                <input class="custom-input material" name="telefonoempresa" type="text"
                                                    placeholder=" " id="telefonoempresa" autocomplete="off">
                                                <label class="input-label" for="">Teléfono</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="content-input">
                                        <input class="custom-input material" name="rubro" type="text" placeholder=" "
                                            id="rubro" autocomplete="off">
                                        <label class="input-label" for="">Rubro</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Aquí irá solo la imagen -->
                        <div class="col-sm-12 col-md-6">
                            <div class="input-group mb-2">
                                <input type="text" readonly onclick="loadImage()" class="form-control input-file"
                                    value="" placeholder="Imagen">
                                <button class="btn-file" onclick="loadImage()" type="button"><i
                                        class="bi bi-card-image icon-input"></i></button>
                            </div>
                            <input name="image" type="file" id="file_logo" accept="image/jpeg, image/png"
                                class="d-none d-flex align-items-center justify-content-center"
                                onchange="previewImage(this)">
                            <div class="card">
                                <div class="card-body content-preview-img px-2 py-1">
                                    <span class="text-preview-img">Vista previa</span>
                                    <br>
                                    <div style="display: flex; justify-content: center; align-items: center;">
                                        <img id="showImagePreview" src="" alt="Cargando..."
                                            style="max-width: 100%; max-height: 175px;">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="guardarEmpresa()">Guardar</button>
            </div>
        </div>
    </div>
</div>