<div class="modal fade" id="aggPlanilla" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light" style="padding: 3px 20px !important;">
                <h5 class="modal-title">Agregar Empleado </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card p-2 mb-0">
                    <form id="formulario_empleado" method="POST">
                        @csrf
                        <div class="col-md-12">
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="content-input mb-3">
                                        <input type="text" id="nombre" class="custom-input" value="" placeholder=" "
                                        onkeyup="this.value = this.value.toUpperCase();"  autocomplete="off" name="nombre">
                                        <label class="input-label" for="nombre">Nombre completo</label>
                                        <!-- Error handling si es necesario -->
                                    </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="content-input mb-3">
                                        <input type="text" id="telefono2" class="custom-input" value="" placeholder=" " name="telefono">
                                        <label class="input-label" for="telefono">Telefono</label>
                                        <!-- Error handling si es necesario -->
                                    </div>
                            </div>
                            <div class="col-md-3">
                                <div class="content-input mb-3">
                                    <input type="text" id="nameEmp" class="custom-input" value="" placeholder=" " name="nameEmp" readonly>
                                    <label class="input-label" for="nameEmp">Empresa</label>
                                    <!-- Error handling si es necesario -->
                                </div>
                        </div>
                            <div class="col-md-3">
                                    <div class="content-input mb-3">
                                        <input type="text" id="dui" name="dui" class="custom-input" value="" placeholder=" "
                                            onkeyup="mayus(this.id)">
                                        <label class="input-label" for="dui">Dui</label>
                                        <!-- Error handling si es necesario -->
                                    </div>
                            </div>    
                            <div class="col-md-3">
                                <div class="content-input mb-3">
                                    <input type="text" id="isss" class="custom-input" name="isss" value="" placeholder=" "
                                        onkeyup="mayus(this.id)">
                                    <label class="input-label" for="isss">ISSS</label>
                                    <!-- Error handling si es necesario -->
                                </div>
                            </div> 
                            <div class="col-md-3">
                                <div class="content-input mb-3">
                                    <input type="text" id="afp" class="custom-input" name="afp" value="" placeholder=" "
                                        onkeyup="mayus(this.id)">
                                    <label class="input-label" for="afp">AFP</label>
                                    <!-- Error handling si es necesario -->
                                </div>
                            </div>    
                            <div class="col-md-3">
                                <div class="content-input mb-3">
                                    <input type="text" id="nit" class="custom-input" value="" placeholder=" "
                                        onkeyup="mayus(this.id)" name="nit">
                                    <label class="input-label" for="nit">NIT</label>
                                    <!-- Error handling si es necesario -->
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="content-input mb-3">
                                    <input type="text" id="cargo" class="custom-input" value="" placeholder=" " name="cargo"  onkeyup="this.value = this.value.toUpperCase();" >
                                    <label class="input-label" for="cargo">Cargo</label>
                                    <!-- Error handling si es necesario -->
                                </div>
                            </div>    
                            <div class="col-md-3">
                                <div class="content-input mb-3">
                                    <input type="date" id="fecha_inicio" class="custom-input" name="fecha_inicio">
                                    <label class="input-label" for="fecha_inicio">Fecha de Inicio</label>
                                    <!-- Error handling si es necesario -->
                                </div>
                            </div>    
                            <div class="col-md-3">
                                <div class="content-input mb-3">
                                    <input type="date" id="fecha_nacimiento" class="custom-input" name="fecha_nacimiento">
                                    <label class="input-label" for="fecha_nacimiento">Fecha de Nacimiento</label>
                                    <!-- Error handling si es necesario -->
                                </div>
                            </div>    
                            <div class="col-md-12">
                                <div class="content-input mb-3">
                                    <input type="text" id="domicilio" class="custom-input" value="" placeholder=" "
                                    onkeyup="this.value = this.value.toUpperCase();"  name="domicilio">
                                    <label class="input-label" for="domicilio">Domicilio</label>
                                    <!-- Error handling si es necesario -->
                                </div>
                                
                            </div>    
                            <div class="col-md-9">
                                       <div class="content-input mb-3">
                                    <input type="text" id="correo" class="custom-input" value="" placeholder=" " name="correo">
                                    <label class="input-label" for="correo">Correo</label>
                                    <!-- Error handling si es necesario -->
                                </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="content-input mb-3">
                                        <input type="text" id="salario_mensual" class="custom-input"  value="" placeholder=" " name="salario_mensual">
                                        <label class="input-label" for="salario_mensual">Salario Mensual</label>
                                        <!-- Error handling si es necesario -->
                                    </div>
                            </div>
                            <div class="col-md-12">
                                    <label>Seleccionar Deducciones:</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="planilla"
                                                    id="deducciones_planilla" name="deducciones">
                                                <label class="form-check-label"
                                                    for="deducciones_planilla">Planilla</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="profesionales"
                                                    id="deducciones_profesionales" name="deducciones">
                                                <label class="form-check-label"
                                                    for="deducciones_profesionales">Servicios profesionales</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="n/a"
                                                    id="deducciones_na" name="deducciones">
                                                <label class="form-check-label" for="deducciones_na" >N/A</label>
                                            </div>
                                        </div>
                                        <!-- Agrega este campo oculto al formulario modal -->
                                    </div>
                                    <input type="hidden" wire:model="empresa_id" id="empresa_id" name="empresai" >
                                </div>
                            </div>
                        </div>
                        <div class="btns d-flex justify-content-end my-2">
                            <button type="button" id="submitBtn" onclick="saveEmpleado()" class="btn btn-outline-primary btn-sm btn-inline">Agregar</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>