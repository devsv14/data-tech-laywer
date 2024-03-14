<style>
  .modal-open .modal {
    background-color: rgba(0, 0, 0, 0.10);
  }  
  .modal-open #new-compra {
    background-color: rgba(0, 0, 0, 0.30);
  }
</style>
<?php
        date_default_timezone_set('America/El_Salvador');
        $hoy = date("d-m-Y");
        $hora = date('H:i:s');
?>
<div class="modal fade" id="new-expediente-modal" data-bs-backdrop="static" data-bs-keyboard="false" >
    <div class="modal-dialog modal-xl modal-dialog-scrollable" >
      <div class="modal-content">
        <div class="modal-header modal-move m-principal" >
          <h5 class="modal-title" id="staticBackdropLabel">CREAR EXPEDIENTE</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">         
      
      <form action="post" id='data-general-compras'>
        <div class="row">

        <div class="col-sm-3">
          <div class="content-input mb-3">
              <input id="comprobante-compra" name="comprobante-compra" type="search" min="0" step=".01"
              class="custom-input material vali-value cls-serv upp-i" placeholder=" ">
              <label class="input-label" for="comprobante-compra">Numero de entrada</label>
          </div>
        </div>

        <div class="col-sm-3">
            <div class="input-group">
                <label class="input-group-title1" for="tipo_comprobante">Tipo materia </label>
                <select name="tipo_comprobante" id="tipo_comprobante" class="border-radius form-select my-select cls-select sel-validate" data-toggle="tooltip"
                    data-placement="bottom" title="Unidad de medida">
                    <option value="0">Selecc...</option>
                    <option value="Factura">PN</option>
                    <option value="Credito Fiscal">VI</option>
                    <option value="Ticket">AC</option>
                    <option value="Sin comprobante">....</option>
                </select>
            </div>
        </div>

        <div class="col-sm-3">
          <div class="content-input mb-2">
              <input id="comprobante-compra" name="comprobante-compra" type="text" value="<?php echo $hoy?>"
              class="custom-input material vali-value cls-serv upp-i" readonly >
              <label class="input-label" for="comprobante-compra">Fecha</label>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="content-input mb-2">
              <input id="comprobante-compra" name="comprobante-compra" type="search" min="0" step=".01"
              class="custom-input material vali-value cls-serv upp-i" placeholder=" " >
              <label class="input-label" for="comprobante-compra">Numero de colaborador</label>
          </div>
        </div>

        <div class="col-sm-12">
        <table class="table table-hover" width='100%'>
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td colspan="2">Larry the Bird</td>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table>
        </div>



        <div class="col-sm-12">
          <div class="content-input mb-2">
              <input id="comprobante-compra" name="comprobante-compra" type="search" 
              class="custom-input material vali-value cls-serv upp-i" placeholder=" " style="height: 40px;">
              <label class="input-label" for="comprobante-compra">Ofendidos</label>
          </div>
        </div>

        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Resolución</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
      </div>

        </div>
      </form>



        <div class="modal-footer d-flex justify-content-center">         
          <button type="button" class="btn btn-outline-success btn-sm" onclick='confirmcompra()'><i class="bi bi-cart-plus"></i> Guardar</button> 
        </div>
      </div>
    </div>
  </div>
</div>