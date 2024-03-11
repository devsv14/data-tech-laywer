
<div class="modal fade" id="DetalleCompra" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header modal-move m-principal">
                <h5 class="modal-title" id="staticBackdropLabel">DETALLES COMPRAS</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="EditEmpresa">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="content-input mb-2">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="content-input mb-2">
                                            <input id="comprobante" name="comprobante" type="text"
                                                class="custom-input material" placeholder=" " onkeyup="mayus(this.id)"
                                                autocomplete="off" disabled>
                                            <label class="input-label" for="">Tipo Documento</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="content-input mb-2">
                                            <input id="Ncomprobante" name="Ncomprobante" type="text"
                                                class="custom-input material" placeholder=" " onkeyup="mayus(this.id)"
                                                autocomplete="off" disabled>
                                            <label class="input-label" for=""># Comprobante</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="content-input mb-2">
                                            <input id="comercio" name="comercio" type="text" class="custom-input material"
                                                placeholder=" " onkeyup="mayus(this.id)" autocomplete="off" disabled>
                                            <label class="input-label" for="">Comercio</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="content-input mb-2">
                                            <input id="monto" name="monto" type="text" class="custom-input material"
                                                placeholder=" " onkeyup="mayus(this.id)" autocomplete="off" disabled>
                                            <label class="input-label" for="">Monto</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="content-input">
                                        <input class="custom-input material" name="responsable" type="text"
                                            placeholder=" " id="responsable" autocomplete="off" disabled>
                                        <label class="input-label" for="">Responsable</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Aquí irá solo la imagen -->
                        <div class="col-sm-12 col-md-6">
                            <div class="input-group mb-2">
                                <input type="text" readonly class="form-control input-file"
                                    value="" placeholder="Imagen" disabled>
                                <button class="btn-file" type="button"><i
                                        class="bi bi-card-image icon-input"></i></button>
                            </div>
                            <input name="imagen" type="file" id="file_logos" accept="image/jpeg, image/png"
                                class="d-none d-flex align-items-center justify-content-center"
                          disabled>
                            <div class="card">
                                <div class="card-body content-preview-img px-2 py-1">
                                    <div style="display: flex; justify-content: center; align-items: center;">
                                            <img id="imagenCompra" src="" alt="IMAGEN NO SUBIDA" style="max-width: 100%; max-height: 175px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-container" style='padding:2px;'>
                            <!-- ... Tu HTML anterior ... -->
                            <table style="width:100%;" class="table-custom table-responsive table-hover table-bordered" id="productos-compras" data-order='[[ 0, "desc" ]]' width="100%;">
                                <thead class="style_th" style="color: white; text-align: center; font-size: 12px; background: #161d31">
                                    <th style="width: 2%">#</th>
                                    <th style="width: 30%">Descripción</th>
                                    <th style="width: 10%">Cant.</th>
                                    <th style="width: 10%">Unidad Medida</th>
                                    <th style="width: 8%">P/U</th>
                                    <th style="width: 8%">Subt.</th>
                                </thead>
                                <tbody class="style_th" style='font-size: 13px; text-align: center; padding: 1px' id='product-venta'></tbody>
                                <tfoot style='background: #f4f6f9; text-align: center;'> <!-- Añadido el estilo de centrado -->
                                    <tr>
                                        <td colspan="5"><strong>Monto total de la Compra</strong></td>
                                        <td colspan="1">
                                            <strong><span>$</span><span id="total_venta_resumen"></span></strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- ... Tu HTML anterior ... -->

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