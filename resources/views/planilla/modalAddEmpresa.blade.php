<div class="modal fade" id="addEmpresa_planilla" tabindex="-1" data-bs-ignore="self">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light" style="padding: 3px 20px !important;">
                <h5 class="modal-title">Agregar Empresa</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card p-2 mb-0">
                    <form id="formulario_empresa" enctype="multipart/form-data">
                        @csrf
                    <div class="row" enctype="multipart/form-data">
                        <div class="col-md-7">
                            <div class="row" enctype="multipart/form-data">
                            </div>
                            <div class="content-input mb-2">
                                <input type="text" id="nombre" class="custom-input material clear-input" value=""
                                    placeholder=" " name="nombre" onkeyup="this.value = this.value.toUpperCase();">
                                <label class="input-label clear-input" for="nombre">Nombre de la Empresa*</label>
                            </div>
                            <div>
                                <div class="content-input mb-2">
                                    <input type="text" id="telefono" class="custom-input material clear_input material" value=""
                                           placeholder=" " name="telefono">
                                    <label class="input-label" for="telefono">Telefono</label>
                                </div>
                                
                                <div class="content-input mb-2">
                                    <input type="text" id="direccion" name="direccion" class="custom-input material clear-input" value=""
                                        placeholder=" " onkeyup="this.value = this.value.toUpperCase();">
                                    <label class="input-label" for="direccion">Direccion</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-5">
                            <div class="input-group mb-2">
                                <input type="text" readonly onclick="loadImage()" class="form-control input-file" value=""
                                    placeholder="Imagen">
                                <button class="btn-file" onclick="loadImage()" type="button"><i
                                        class="bi bi-card-image icon-input"></i></button>
                            </div>
                            <input name="image" type="file" id="file_logo" accept="logo/jpeg, logo/png"
                                class="d-none d-flex align-items-center justify-content-center" required>
                                                        <div class="card">
                                <div class="card-body content-preview-img px-2 py-1">
                                    <span class="text-preview-img object-fit: contain;">Vista previa de imagen <div id="loading"> Cargando...</div></span>
                                    <br>
                                    <div style="display: flex; justify-content: center; align-items: center;">
                                        <img id="showImagePreview" src="" style="max-width: 100%; max-height: 175px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="btns d-flex justify-content-end my-2">
                        <!-- Cambiado el atributo wire:click por onclick -->
                        <button type="button" onclick="guardarEmpresa()" class="btn btn-outline-primary btn-sm btn-inline">Agregar</button>

                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
