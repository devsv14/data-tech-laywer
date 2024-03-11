<style>
  .modal-open .modal {
    background-color: rgba(0, 0, 0, 0.10);
  }  
  .modal-open #new-compra {
    background-color: rgba(0, 0, 0, 0.30);
  }
</style>

<div class="modal fade" id="new-compra" data-bs-backdrop="static" data-bs-keyboard="false" >
    <div class="modal-dialog modal-dialog-scrollable" style='max-width:95%'>
      <div class="modal-content">
        <div class="modal-header modal-move m-principal" >
          <h5 class="modal-title" id="staticBackdropLabel">CREAR COMPRA</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">         
       
      <form action="post" id='data-general-compras'>
      <div class="row">

          <div class="col-sm-2">
            <div class="input-group">
                <label class="input-group-title1" for="tipo_comprobante">Tipo Comprobante: </label>
                <select name="tipo_comprobante" id="tipo_comprobante" class="border-radius form-select my-select cls-select sel-validate" data-toggle="tooltip"
                    data-placement="bottom" title="Unidad de medida">
                    <option value="0">Selecc...</option>
                    <option value="Factura">Factura</option>
                    <option value="Credito Fiscal">Credito Fiscal</option>
                    <option value="Ticket">Ticket</option>
                    <option value="Sin comprobante">Sin comprobante</option>
                </select>
            </div>
        </div>

        <div class="col-sm-3">
          <div class="content-input mb-2">
              <input id="comprobante-compra" name="comprobante-compra" type="search" min="0" step=".01"
              class="custom-input material vali-value cls-serv upp-i" placeholder=" ">
              <label class="input-label" for="comprobante-compra">No. comprobante</label>
          </div>
        </div>

        <div class="col-sm-5">
          <div class="content-input mb-2">
              <input id="name-vendedor-compra" name="name-vendedor-compra" type="search" min="0" step=".01"
              class="custom-input material vali-value cls-serv upp-i" placeholder=" ">
              <label class="input-label" for="name-vendedor-compra">Comercio / Vendedor</label>
          </div>            
        </div>

        <div class="col-sm-2">
          <div class="content-input mb-2">
              <input id="fecha_compra" name="fecha_compra" type="date" min="0" step=".01"
              class="custom-input material vali-value cls-serv" placeholder=" ">
              <label class="input-label" for="fecha_compra">Fecha de compra</label>
          </div>            
        </div>
        <div class="col-sm-8">
          <div class="content-input mb-2">
              <input id="obs-compra" name="obs-compra" type="search" 
              class="custom-input material vali-value cls-serv upp-i" placeholder=" " >
              <label class="input-label" for="obs-compra">Observaciones*</label>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="content-input mb-2">
              <input id="resp-compra" name="resp-compra" type="search" 
              class="custom-input material vali-value cls-serv upp-i" placeholder=" ">
              <label class="input-label" for="resp-compra">Responsable compra*</label>
          </div>
        </div>

      </div>
      </form>

      <div class="modal-footer d-flex justify-content-left">
        <i class="bi bi-plus-circle i-pointer" ></i>          
      </div>

        <div class="row form-row">

          <div class="col-sm-2">
            <div class="content-input">
              <input type="number" class="custom-input material vali-diseno cls-serv calc-subt cl-input" placeholder=" " id='cant-item-compra'>
              <label class="input-label" for='cant-item-compra'>Cantidad</label>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="input-group">
              <input type="search" class="form-control cl-input upp-i" placeholder="Producto/servicio/bien" list='productos-exist' id='nombre-item-c' onclick="comprobarTipoDoc(this)" onchange="comprobarTipoDoc(this)">
            </div>
            <datalist id='productos-exist'>
              @foreach($productos as  $prod)
               <option value="{{$prod->producto}}" ></option>  
              @endforeach 
            </datalist>
          </div>

          <div class="col-sm-2">
            <div class="input-group"> 
              <label class="input-group-title1" for="id_unidad_medida">Categoria</label>
              <select class="form-select sel-clear" aria-label="Default select example" id='cat-item-compra' name='cat-item-compra' style='text-transform:uppercase'>   
              <option value="" disabled selected>Seleccionar...</option>  
              @foreach($options as  $option)
                  <option value="{{$option->id}}">{{$option->nombre}}</option>  
              @endforeach                 
              </select>
                <button class="btn-add-input bg-primary" type="button" id="btn-add-cat-compras" style='border:none'>
                  <i class="bi bi-plus-circle" style="color:rgb(255, 255, 255)"></i>
                </button>
              </div>
          </div> 

          <div class="col-sm-2">
            <div class="input-group"> 
              <label class="input-group-title1" for="unidad-medida-compra">Unidad de medida</label>
                <select class="form-select sel-clear" aria-label="Default select example" id='unidad-medida-compra' name='unidad-medida-compra'  onchange="focusCant()">   
                <option value="" disabled selected>Seleccionar...</option> 
                </select>              
              </div>
          </div>

          <div class="col-sm-2">
            <div class="content-input"><input type="number" class="custom-input material vali-diseno cls-serv calc-subt cl-input" placeholder=" " id='precio-item-compra'>
            <label class="input-label" for='precio-item-compra'>Precio Unit.</label>
            </div>
          </div>          

             
        </div>
        <h1 class="d-flex justify-content-end" style='font-size:14px;margin-right: 40px;color:rgb(23, 23, 107)'><b>SUMAS: $<span id='sumas-compras-head'></span></b></h1>
        <table class="table table-sm table-striped table-hover" width='100%'>
          <thead class="bg-dark"  style="color:white;font-size: 11px;text-align:center;background:black !important">
            <tr style="color:white;min-height:10px;border-radius: 2px;font-size: 11px;text-align:center;background:black !important" class="bg-dark">
              <th style='width:40%;color:white;background:black'>Descripción</th>
              <th style='width:15%;color:white;background:black'>Categoría</th>
              <th style='width:10%;color:white;background:black'>U. medida</th>
              <th style='width:10%;color:white;background:black'>Cantidad</th>
              <th style='width:10%;color:white;background:black'>Precio U.</th>
              <th style='width:5%;color:white;background:black'>Subtotal</th>
              <th style='width:10%;color:white;background:black'>Acciones</th>
            </tr>
          </thead>
          <tbody id="det-items-compra" style="font-size:14px"></tbody>
          <tfoot style="background-color: rgb(196, 231, 241) !important; ">
            <tr style="min-height:10px;border-radius: 2px;font-size: 11px;text-align:center;background:rgb(196, 231, 241)">
              <td style='width:40%;text-align:center'></td> <td style='width:15%;'></td>
              <td style='width:15%;'></td>
              <td style='width:10%;'></td>
              <td style='width:10%;text-align:right'><b>Sumas</b></td>
              <td style='width:10%;font-size:14px;color:rgb(23, 23, 107)'><b>$<span id='sumas-compras-foot'></b></span></td>
              <td style='width:5%;'></td>
              <td style='width:10%;'></td>
            </tr>

            <tr style="min-height:10px;border-radius: 2px;font-size: 11px;text-align:center;background:rgb(196, 231, 241)">
              <td style='width:30%;text-align:center'></td> <td style='width:15%;'></td>
              <td style='width:15%;'></td>
              <td style='width:10%;'></td>
              <td style='width:10%;text-align:right'><b>IVA</b></td>
              <td style='width:20%;font-size:14px;color:rgb(23, 23, 107);text-align:center' id='td-iva'><b>$<span id='iva-compras-foot' {{-- onclick='fijarIva()' --}} style="cursor: pointer"></b></span>{{-- <i class="bi bi-x-circle" style='cursor:pointer;color:red' onclick='deleteIva()'></i> --}}</td>
              <td style='width:5%;'></td>
              <td style='width:10%;'></td>
            </tr>

            <tr style="min-height:10px;border-radius: 2px;font-size: 11px;text-align:center;background:rgb(196, 231, 241)">
              <td style='width:40%;text-align:center'></td> <td style='width:15%;'></td>
              <td style='width:15%;'></td>
              <td style='width:10%;'></td>
              <td style='width:10%;text-align:right'><b>Impuestos</b></td>
              <td style='width:10%;font-size:14px;color:rgb(23, 23, 107)'><b>$<span style='outline:none' id='impuestos-compras-foot' contenteditable='true' onkeyup="getValueImpuestos()"></b></span></td>
              <td style='width:5%;'><span id='sum-imp-compras'></span></td>
              <td style='width:10%;'></td>
            </tr>

            <tr style="min-height:10px;border-radius: 2px;font-size: 11px;text-align:center;background:rgb(196, 231, 241)">
              <td style='width:40%;text-align:center'></td> <td style='width:15%;'></td>
              <td style='width:15%;'></td>
              <td style='width:10%;'></td>
              <td style='width:10%;'><b>TOTALES</b></td>
              <td style='width:10%;font-size:14px;color:rgb(23, 23, 107)'><b>$<span id='totales-compras-foot'  style='outline:none'
                contenteditable='true'></b></span></td>
              <td style='width:5%;'></td>
              <td style='width:10%;'></td>
            </tr>
          </tfoot>
        </table>    

        <div class="modal-footer d-flex justify-content-center">         
          <button type="button" class="btn btn-outline-success btn-sm" onclick='confirmcompra()'><i class="bi bi-cart-plus"></i> Guardar</button> 
        </div>
      </div>
    </div>
  </div>
</div>