<div class="modal fade" id="ModalEditUser" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header modal-move m-principal">
                <h5 class="modal-title" id="staticBackdropLabel">EDITAR DATOS DE USUARIO</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action=""  id="userFormEd">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="content-input mb-2">
                                <input id="nombreEd" name="nombreEd" type="text" 
                                    class="custom-input material" placeholder=" "  onkeyup="mayus(this.id)" autocomplete="off">
                                <label class="input-label" for="">Nombre</label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="content-input">
                                <input class="custom-input material"
                                    name="telefonoEd" type="text" placeholder=" " id="telefonoEd">
                                <label class="input-label" for="">Teléfono</label>
                            </div>
                        </div>
                        <input type="hidden" name="idUsuario" id="idUsuario" value="">

                        <div class="col-sm-3">
                            <div class="content-input">
                                <input class="custom-input material"
                                    name="duiEd" type="text" placeholder=" " id="duiEd">
                                <label class="input-label" for="">Dui</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <label class="input-group-title1" for="">Cargo: </label>
                                <select name="cargoEd" id="cargoEd"
                                    class="border-radius form-select my-select cls-select" data-toggle="tooltip"
                                    data-placement="bottom" title="cargoEd">
                                    <option value="" disabled selected>Selecc...</option>
                                    <option value="Administrativo">Administrativo</option>
                                    <option value="Recepcionistas">Recepcionistas</option>
                                    <option value="Camarero">Camarero</option>
                                    <option value="Operativo">Operativo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="content-input mb-2">
                                <input id="correoEd" name="correoEd" type="text" 
                                    class="custom-input material" placeholder=" "  autocomplete="off">
                                <label class="input-label" for="">Correo</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="content-input mb-2">
                                <input id="usuarioEd" name="usuarioEd" type="text" 
                                    class="custom-input material" placeholder=" " autocomplete="off">
                                <label class="input-label" for="">Usuario</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="content-input mb-2">
                                <input id="contraseñaEd" name="contraseñaEd" type="password" 
                                    class="custom-input material" placeholder=" "   autocomplete="off">
                                <label class="input-label" for="">Contraseña</label>
                            </div>
                        </div>    
                        <div class="col-sm-4">
                            <div class="input-group">
                                <label class="input-group-title1" for="">Estado: </label>
                                <select name="estadoEd" id="estadoEd"
                                    class="border-radius form-select my-select cls-select" data-toggle="tooltip"
                                    data-placement="bottom" title="estado">
                                    <option value="" disabled selected>Selecc...</option>
                                    <option value="Habilitado">Habilitado</option>
                                    <option value="Inabilitado">Inabilitado</option>
                                </select>
                            </div>
                        </div>  
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="EditarUsuario()">Guardar</button>
            </div>
        </div>
    </div>
</div><!-- End Extra Large Modal-->