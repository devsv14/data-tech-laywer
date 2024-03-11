<div class="modal fade" id="modalImagen" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-scrollable" style='max-width:30%'>
    <div class="modal-content">
      <div class="modal-header modal-move m-principal">
        <h5 class="modal-title" id="staticBackdropLabel">SUBIR COMPROBANTE</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="col-sm-12 col-md-12">
          <input type="hidden" name="idCompra" id="idCompra" value="">
          <div class="input-group mb-2">
              <input type="text" readonly class="form-control input-file" value="" placeholder="Comprobante" onclick="openFileInput()">
              <button class="btn-file" onclick="openFileInput()" type="button"><i
                class="bi bi-card-image icon-input"></i></button>         
             <input name="image" type="file" id="file_logo" accept="image/jpeg, image/png" class="d-none" onchange="previewImage(this)">
          </div>
          <div class="card">
              <div class="card-body content-preview-img px-2 py-1">
                  <span class="text-preview-img">Vista previa</span>
                  <br>
                  <div style="display: flex; justify-content: center; align-items: center;">
                      <img id="showImagePreview" src="" alt="" style="max-width: 100%; max-height: 175px;">
                  </div>
              </div>
          </div>
      </div>
      
        <div class="modal-footer d-flex justify-content-center">
          <button type="button" class="btn btn-outline-info btn-sm" onclick='subirimg()'><i class="bi bi-send-plus"></i> Guardar</button>
        </div>
      </div>
    </div>
  </div>
</div>