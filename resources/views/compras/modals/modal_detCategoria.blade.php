<style>
  .modal-open .modal {
    background-color: rgba(0, 0, 0, 0.10);
  }

  .modal-open #new-compra {
    background-color: rgba(0, 0, 0, 0.30);
  }
</style>

<div class="modal fade" id="DetCat" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-scrollable" style='max-width:95%'>
    <div class="modal-content">
      <div class="modal-header modal-move m-principal">
        <h5 class="modal-title" id="staticBackdropLabel">Detalle de categoria: </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
       
        <span style="display: block; text-align: center; color:#012970;" id="categoriaDetalle"></span>

            <!-- Table with stripped rows -->
            <table class="table-custom table-responsive table-hover table-bordered" style="width:100%" id="det_categoria">
              <thead class="bg-dark text-light">
                <tr>
                  <th class="text-center">Id</th>
                  <th class="text-center">Num. Comprobante</th>
                  <th class="text-center">Fecha</th>
                  <th class="text-center">Encargado</th>
                  <th class="text-center">Subtotal</th>
                  <th class="text-center">Iva</th>
                  <th class="text-center">Total</th>
                </tr>
              </thead>
              <tbody class="text-center" style="font-size:14px">
                <!-- Contenido de la tabla -->
              </tbody>
            </table>
            <!-- End Table with stripped rows -->
      </div>
    </div>
  </div>
</div>