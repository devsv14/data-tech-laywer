<!-- Modal -->
<div class="modal fade" id="new-producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog" style='max-width:80%'>
      <div class="modal-content">
        <div class="modal-header modal-move m-principal">
          <h5 class="modal-title" id="exampleModalLabel">PRODUCTOS</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h1 style="font-size: 18px;text-align:center;margin-top:8px" ><b>AGREGAR NUEVO PRODUCTO</b></h1>
       
          <div class="row">
            <div class="col-sm-8">
                <div class="content-input">
                  <input type="text" class="custom-input material vali-diseno cls-serv" placeholder=" " id='name-producto' style='text-transform:uppercase'>
                  <label class="input-label">Nombre producto</label>
                </div>
            </div>
            <div class="col-sm-4">

              </div>
              <div class="col-sm-2"></div>
              <div class="col-sm-4 shadow-sm" style='color:black; position: relative; border: solid rgb(236, 233, 233) 1px; padding: 6px;margin-top:10px;margin-right:3px !important'>
                <h3 style='font-size: 16px; position: absolute; top: 0; left: 50%; transform: translate(-50%, -50%); margin: 0; margin-bottom: 10px; background: white; z-index: 10; border-radius: 2px; padding: 2px;'>Preceredero</h3>
            
                <table style="width: 100%; text-align: center;">
                    <tr>
                        <td>
                            <div class="icheck-success p-1">
                                <input type="radio" name="perecedero-prod" id="perecedero-si" class="chk-search-orden" value="Si">
                                <label for="perecedero-si">Si</label>
                            </div>
                        </td>
                        <td>
                            <div class="icheck-success d-inline">
                                <input type="radio" name="perecedero-prod" id="perecedero-no" class="chk-search-orden" value="No">
                                <label for="perecedero-no">No</label>
                            </div>
                        </td>
                    </tr> 
                </table>
            </div>

            <div class="col-sm-4 shadow-sm " style='color:black; position: relative; border: solid rgb(236, 233, 233) 1px; padding: 6px;margin-top:10px;margin-left:3px !important'>
                <h3 style='font-size: 16px; position: absolute; top: 0; left: 50%; transform: translate(-50%, -50%); margin: 0; margin-bottom: 10px; background: white; z-index: 10; border-radius: 2px; padding: 2px;'>Control stock minimo</h3>
            
                <table style="width: 100%; text-align: center;">
                    <tr>
                        <td>
                            <div class="icheck-success p-1">
                                <input type="radio" name="stock-min-prod" id="search-ventas" class="chk-search-orden" value="Si">
                                <label for="search-ventas">Si</label>
                            </div>
                        </td>
                        <td>
                            <div class="icheck-success d-inline">
                                <input type="radio" name="stock-min-prod" id="search-consultas" class="chk-search-orden" value="No">
                                <label for="search-consultas">No</label>
                            </div>
                        </td>
                    </tr>
                </table>
            </div> 
            <div class="col-sm-2"></div>               
            </div>
          </div>
   
          <div class="modal-footer d-flex justify-content-center">         
            <button type="button" class="btn btn-primary btn-sm" id='reg-new-prod'><i class="bi bi-cart-plus"></i> Registrar nuevo producto </button> 
          </div>

      </div>
    </div>
  </div>