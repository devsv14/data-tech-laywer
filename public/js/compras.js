$(document).ready(function () {
    let urlDataTableCompras = window.location.origin + "/getCompras";
    dataTable("compras", urlDataTableCompras);
});

function comprobarTipoDoc(elemento){
    let documento = document.getElementById('tipo_comprobante').value;
    if(documento=='0'){
        Swal.fire({
            title: "Error!",
            text: "Debe elegir tipo de documento!",
            icon: "error",
        });
        elemento.value ='';elemento.focus()
        return false;
    }

}

let arrayItemsCompra = [];

let btnaddProdcompra = document.getElementById("add-producto-compra-btn");
if (btnaddProdcompra) {
    btnaddProdcompra.addEventListener("click", () => {
        addItemCompra();
    });
}

let btnaddProducto = document.getElementById("btn-add-producto");
if (btnaddProducto) {
    btnaddProducto.addEventListener("click", () => {
        let modalNewProducto = new bootstrap.Modal("#new-producto");
        modalNewProducto.show();
    });
}
var ivas = 0;
function addItemCompra() {
    let descItemC = document.getElementById("nombre-item-c").value;
    let cantItemC = document.getElementById("cant-item-compra").value;
    let precioItemC = document.getElementById("precio-item-compra").value;
    //let catItem = document.getElementById('cat-item-compra').value;
    let umedida = document.getElementById("unidad-medida-compra").value;
    let tipo_documento = document.getElementById("tipo_comprobante").value;
    let selectElement = document.querySelector("#cat-item-compra");
    let catItem = selectElement.options[selectElement.selectedIndex].text;
    let idCategoria = selectElement.value;
    let ivaItem = 0.00;
   if(tipo_documento=="Credito Fiscal"){
    ivaItem = (parseFloat(cantItemC)*parseFloat(precioItemC))*0.13; ivaItem.toFixed(2);
   }
    if (descItemC == "" || cantItemC == "" || precioItemC == "" || umedida == "" || idCategoria == "") {
        Toast.fire({
            icon: "error",
            title: "Completar todos los campos requeridos",
        });
        return false;
    }
    let obj = {
        descItemC,cantItemC,precioItemC,catItem,umedida,idCategoria,ivaItem
    };

    arrayItemsCompra.push(obj);   
    console.log(arrayItemsCompra)   
    listar_items_compras()
    
}

function listar_items_compras() {
    $("#det-items-compra").html("");
    let filas = "";
    var totales = 0;

    for (var i = 0; i < arrayItemsCompra.length; i++) {
        let subtotal = parseFloat(arrayItemsCompra[i].cantItemC) * parseFloat(arrayItemsCompra[i].precioItemC);
        subtotal.toFixed(2)
        let precioItem = parseFloat(arrayItemsCompra[i].precioItemC);
        filas =
            filas +
            "<tr id='filacompra" +
            i +
            "'>" +
            "<td style='text-align:center;width:40%;'><span contenteditable='true' class='editable-span'>" +
            arrayItemsCompra[i].descItemC +
            "</span></td>" +
            "<td style='text-align:center;width:15%;'><span contenteditable='true' class='editable-span'>" +
            arrayItemsCompra[i].catItem +
            "</span></td>" +
            "<td style='text-align:center;width:10%'><input  class='input-transparent' onkeyup='change_cantidad(" +
            arrayItemsCompra[i].id +
            ",this.value,this)' type='search' value='" +
            arrayItemsCompra[i].umedida.toUpperCase() +
            "'></td>" +
            "<td style='text-align:center;width:10%'><span contenteditable='true' class='editable-span'>" +
            arrayItemsCompra[i].cantItemC +
            "</span></td>" +
            "<td style='text-align:center;width:10%'><input  class='input-transparent' onkeyup='change_cantidad(" +
            arrayItemsCompra[i].id +
            ",this.value,this)' type='search' value='$" +
            precioItem.toFixed(2) +
            "'></td>" +
            "<td style='text-align:center;width:5%'>$" +
            subtotal.toFixed(2) +
            "</td>" +
            "<td style='text-align:center;width:10%'><i class='nav-icon fas fa-times-circle' onClick='eliminarFilaItemCompra(" +
            i +
            ");' style='color:red; cursor:pointer'></i></td>" +
            "</tr>";
    }

    $("#det-items-compra").html(filas);
    clearInputs();
    let descripcion = document.getElementById("nombre-item-c");
    calculaTotalesCompra();
    descripcion.focus();
}

function eliminarFilaItemCompra(indice) {
    arrayItemsCompra.splice(indice, 1);
    $("#filacompra" + indice).remove();
    listar_items_compras();
}

var impuestosTotales = 0;
var ivaTotal = 0;

function deleteIva(){
   ivaTotal = 0;
   let sumas = document.getElementById("sumas-compras-foot").innerHTML;
   let impuestos = document.getElementById("impuestos-compras-foot").innerHTML;
   let totalImp = 0.00;
   if(impuestos==''||impuestos=='0'){
    totalImp=0.00
   }else{
    totalImp = parseFloat(impuestos)
   }
   let totales = parseFloat(totalImp)+parseFloat(sumas)
   document.getElementById("iva-compras-foot").innerHTML='0';
   document.getElementById("totales-compras-foot").innerHTML=totales.toFixed(2);
   document.getElementById("sumas-compras-head").innerHTML = totales.toFixed(2);

}

function fijarIva(){
    let spanSumas = document.getElementById("sumas-compras-foot").innerHTML;
    let impuestos = document.getElementById("impuestos-compras-foot").innerHTML;
    let iva = document.getElementById("iva-compras-foot");
    let totalImp = 0.00;
    if(impuestos == ''||impuestos == '0'){
     totalImp = 0.00
    }else{
     totalImp = parseFloat(impuestos)
    }
    ivaTotal = parseFloat(spanSumas)*0.13;    
    let sumas = parseFloat(spanSumas)+parseFloat(totalImp)+parseFloat(ivaTotal);

    iva.innerHTML = ivaTotal.toFixed(2);
    document.getElementById('td-iva').style.display = 'flex';
    document.getElementById("totales-compras-foot").innerHTML=sumas.toFixed(2);
    document.getElementById("sumas-compras-head").innerHTML = sumas.toFixed(2);

}

function getValueImpuestos() {
    let impuesto = document.getElementById("impuestos-compras-foot").innerText;
    let sumas = arrayItemsCompra.reduce((acumulador, item) => {
        const subtotal = item.cantItemC * item.precioItemC;
        return acumulador + subtotal;
    }, 0);

    if (impuesto.includes("+")) {
        if (impuesto.endsWith("+")) {
            Toast.fire({ icon: "error", title: "complete la operación" });
        } else {
            if (!isNaN(impuesto)) {
                console.log("N/A");
            } else {
                var operandos = impuesto.split("+").map(parseFloat);
                if (
                    operandos.every(
                        (numero) => typeof numero === "number" && !isNaN(numero)
                    )
                ) {
                    let sumaImp = operandos.reduce(
                        (acumulador, numero) => acumulador + numero,
                        0
                    );
                    impuestosTotales = sumaImp;
                    let new_total =
                        parseFloat(sumas) +
                        parseFloat(impuestosTotales) +
                        parseFloat(ivaTotal);
                    document.getElementById("totales-compras-foot").innerHTML = new_total.toFixed(2);
                    document.getElementById("sumas-compras-head").innerHTML = new_total.toFixed(2);
                } else {
                    Toast.fire({
                        icon: "error",
                        title: "Los valores deben ser numericos",
                    });
                }
            }
        }
    } else {
        let regex = /^\d+(\.\d+)?$/;
        if (regex.test(impuesto)) {
            impuesto = parseFloat(impuesto);
            impuestosTotales = impuesto;
            let new_total =
                parseFloat(sumas) +
                parseFloat(impuestosTotales) +
                parseFloat(ivaTotal);
            document.getElementById("totales-compras-foot").innerHTML = new_total.toFixed(2);
            document.getElementById("sumas-compras-head").innerHTML = new_total.toFixed(2);
        } else {
            console.log("Valor no permitido");
        }
    }
}

function calculaTotalesCompra() {
    let sumaSubtotales = arrayItemsCompra.reduce((acumulador, item) => {
        const subtotal = item.cantItemC * item.precioItemC;
        return acumulador + subtotal;
    }, 0);
    let imp = document.getElementById("impuestos-compras-foot").innerHTML;
    let impuesto = "";
    if (isNaN(imp) || imp == "" || imp=='0') {
        impuesto = 0;
    } else {
        impuesto = imp;
        if (isNaN(impuesto)) {
            impuesto = 0;
        }
    }

    sumaSubtotales = parseFloat(sumaSubtotales).toFixed(2);
    let documentoFiscal = document.getElementById('tipo_comprobante').value;

    ivaTotal = documentoFiscal=="Credito Fiscal" ? sumaSubtotales * 0.13 : 0;
    impuestosTotales = impuesto;
    let totales = parseFloat(sumaSubtotales) + parseFloat(ivaTotal) + parseFloat(impuesto);
    document.getElementById("sumas-compras-foot").innerHTML = sumaSubtotales;
    document.getElementById("sumas-compras-head").innerHTML = parseFloat(totales).toFixed(2);
    document.getElementById("iva-compras-foot").innerHTML = parseFloat(ivaTotal).toFixed(2);
    document.getElementById("totales-compras-foot").innerHTML = parseFloat(totales).toFixed(2);
}

function clearInputs() {
    const inputElements = document.querySelectorAll("input.cl-input");
    inputElements.forEach((input) => {
        input.value = "";
    });
    let selectElements = document.querySelectorAll("select.sel-clear");

    selectElements.forEach((select) => {
        select.selectize.setValue("");
    });
}

function focusCant() {
    let cantInput = document.getElementById("cant-item-compra");
    cantInput.focus();
}

let btnadCatcompra = document.getElementById("btn-add-cat-compras");

if (btnadCatcompra) {
    btnadCatcompra.addEventListener("click", () => {
        let modalCatCompras = new bootstrap.Modal("#add-categoria-compra");
        modalCatCompras.show();
    });
}

let btnRegCatcompra = document.getElementById("registra-categoria-compra");

if (btnRegCatcompra) {
    btnRegCatcompra.addEventListener("click", () => {
        let categoria = document.getElementById("new-categoria-compra").value;
        axios
            .post(route("insert.catcompra"), { categoria })
            .then((response) => {
                let data = response.data;
                $("#add-categoria-compra").modal("hide");
                let categorias = $("#cat-item-compra").selectize();
                let seelctExists = categorias[0].selectize;
                seelctExists.addOption({ value: data.id, text: categoria });
                seelctExists.setValue(data.id);
                seelctExists.refreshItems();
            })
            .catch((error) => {
                console.error(error);
            });
    }); //  finAddEvenListener
}

let inputCantCompra = document.getElementById("precio-item-compra");
inputCantCompra.addEventListener("keydown", (event) => {
    if (event.key === "Enter" && event.target === document.activeElement) {
        console.log('Enter')
        addItemCompra();
    }
});

function confirmcompra() {
    let totalCompra = document.getElementById("totales-compras-foot").innerHTML;
    let validaInputs = validarCampos(".vali-value", ".sel-validate");
    if (validaInputs) {
        if (arrayItemsCompra.length == 0) {
            Swal.fire({
                title: "Error!",
                text: "Lista de compras vacia!",
                icon: "error",
            });
            return false;
        } else {
            let urlDataTableCompras = window.location.origin + "/getCompras";
            dataTable("compras", urlDataTableCompras);
            Swal.fire({
                html: `<span>Registrar compra por: </span><b><span>${totalCompra}:</span></b>`,
                text: "!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Registrar",
            }).then((result) => {
                if (result.isConfirmed) {
                    registrarcompra();
                }
            });
        }
        /* let modalConfirmCompras = new bootstrap.Modal("#modal-confirm-compra");
        modalConfirmCompras.show(); */
    }
}

function registrarcompra() {
    let montoTotal = document.getElementById("sumas-compras-foot").innerHTML;
    let formCompras = document.getElementById("data-general-compras");
    let dataForm = new FormData(formCompras);
    dataForm.append("data-items-compra", JSON.stringify(arrayItemsCompra));
    dataForm.append("monto-total", montoTotal);
    dataForm.append("impuestos-total", impuestosTotales);
    dataForm.append("iva", ivaTotal);


    axios.post(route("insert.compra"), dataForm)
        .then((response) => {
            let data = response.data;
            let newProducts = data.productos;
            console.log(data);
            if (data.msjInsert == "insert") {
                document.getElementById("det-items-compra").innerHTML = "";
                Swal.fire({
                    title: "VENTA REGISTRADA EXITOSAMENTE!",
                    text: "",
                    icon: "success",
                });
                limpiarFormulario("data-general-compras");
                document.getElementById("det-items-compra").innerHTML = "";
                /*  $("#new-compra").modal('hide'); */
                let dataList = document.getElementById("productos-exist");
                newProducts.forEach((elemento) => {
                    const option = document.createElement("option");
                    option.value = elemento;
                    dataList.appendChild(option);
                });
                document.getElementById("det-items-compra").innerHTML=''
                let urlDataTableCompras = window.location.origin + "/getCompras";
                dataTable("compras", urlDataTableCompras);
            }
        })
        .catch((error) => {
            console.error(error);
        });
}

////////REGISTRAR COMPRAS  //////////////////

function registrarNuevacompra() {
    console.log("*/");
}


function DetallesCompras(id) {
    console.log(id);
    axios
        .get("/obtenerCompra/" + id)
        .then(function (response) {
            // Manejar la respuesta exitosa del servidor
            let compra = response.data.compra;
            let detalles = response.data.detalle;
            console.log(response.data);
            document.getElementById("comprobante").value = compra.tipo_comprobante;
            document.getElementById("comprobante").value = compra.tipo_comprobante;
            document.getElementById("Ncomprobante").value = compra.numero_comprobante;
            document.getElementById("monto").value = compra.monto;
            document.getElementById("responsable").value = compra.resp_compra;
            document.getElementById("comercio").value = compra.comercio;
            document.getElementById("imagenCompra").src = compra.img_comprobante;

            var table = document.getElementById("productos-compras");
            table.getElementsByTagName("tbody")[0].innerHTML = "";
            var totalCompra = 0; 
            var htmlFilas = "";
            var totalCompra = 0; // Variable para almacenar la suma de los subtotales

            for (var i = 0; i < detalles.length; i++) {
                var detalle = detalles[i];
                var subtotal =parseFloat(detalle.cantidad) * parseFloat(detalle.precio_unitario);
                var precioUnitario = parseFloat(detalle.precio_unitario).toFixed(2);

                totalCompra += subtotal; // Sumar al total

                htmlFilas +=
                    "<tr id='filacompra" + i + "'>" +
                    "<td style='text-align:center;'>" + detalle.id + "</td>" +
                    "<td style='text-align:center;'>" + detalle.producto + "</td>" +
                    "<td style='text-align:center;'>" + detalle.cantidad +  "</td>" +
                    "<td style='text-align:center;'>" + detalle.umedida + "</td>" +
                    "<td style='text-align:center;'>" + "$" + precioUnitario + "</td>" +
                    "<td style='text-align:center;'>" + "$" + subtotal.toFixed(2) + "</td>" + 
                    "</tr>";
            }
            // Insertar las filas generadas en la tabla
            document
                .getElementById("productos-compras")
                .getElementsByTagName("tbody")[0].innerHTML = htmlFilas;
            // Mostrar la suma de subtotales en el tfoot
            document.getElementById("total_venta_resumen").textContent =
                totalCompra.toFixed(2);
        })
        .catch(function (error) {
            // Manejar errores
            console.error(error);
        });
    $("#DetalleCompra").modal("show");
}

function AgregarComprobante(id) {
    console.log(id);
    
    document.getElementById("idCompra").value = id;
    // Limpiar el input de archivo y la vista previa al abrir el modal
    document.getElementById("file_logo").value = "";
    document.getElementById("showImagePreview").src = "";
    $("#modalImagen").modal("show");
}

function openFileInput() {
    document.getElementById("file_logo").click();
}

function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById("showImagePreview").src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function subirimg() {
    // Obtén el input de archivo
    let inputFile = document.getElementById("file_logo");
    let idCompra = document.getElementById("idCompra").value;

    // Verifica si se seleccionó un archivo
    if (inputFile.files.length > 0) {
        // Crea un objeto FormData para enviar datos al servidor
        var formData = new FormData();
        // Agrega la imagen al FormData
        formData.append("image", inputFile.files[0]);
        // Agrega el ID al FormData
        formData.append("id", idCompra);
        // Realiza la petición POST con Axios
        axios
            .post("/saveImg", formData)
            .then(function (response) {
                // Manejar la respuesta del servidor si es necesario
                console.log(response.data);
                let urlDataTableCompras = window.location.origin + "/getCompras";
                dataTable("compras", urlDataTableCompras);
                // Cierra el modal después de realizar las acciones necesarias
                Swal.fire({
                    title: "IMAGEN REGISTRADA EXITOSAMENTE!",
                    text: "",
                    icon: "success",
                });
                $("#modalImagen").modal("hide");
            })
            .catch(function (error) {
                // Manejar errores
                console.error(error);
            });
    } else {
        // No se seleccionó ningún archivo, puedes manejar este caso según tus necesidades
        console.log("No se seleccionó ningún archivo");
    }
}

///////

function imagenExiste(id){
    let id_compra = id;
    Swal.fire({
        html: "<h4>La compra ya posee una imagen</h4> <br>  <h5>Desea sustituir la imagen</h5>",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sustituir",
        cancelButtonText: "Ver Comprobante",
        cancelButtonColor: "skyblue",
        })
    .then((result) => {
        if (result.isConfirmed) {
            AgregarComprobante(id_compra);
        }else if (result.dismiss === Swal.DismissReason.cancel) {
            // Se activa la función DetallesCompras() al presionar el botón de cancelar
            DetallesCompras(id_compra);
        }
    });

}

/// documentacioon
$(function() {
    // Declarar la variable monto fuera del evento para que esté disponible globalmente
    let monto;

    // Inicializar el datepicker
    $('input[name="datefilter"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        },
        // Especificar el formato de fecha deseado
        format: 'DD/MM/YYYY'
    });

    // Cuando se aplica un rango de fechas
    $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
        let startDate = picker.startDate.format('DD/MM/YYYY');
        let endDate = picker.endDate.format('DD/MM/YYYY');

        // Establecer el valor del campo de entrada con el rango seleccionado
        $(this).val(startDate + ' - ' + endDate);

        // Crear un objeto FormData con las fechas
        let formData = new FormData();
        formData.append('startDate', startDate);
        formData.append('endDate', endDate);

        axios
        .post("/consultaCompras", formData)
        .then(function (response) {
            // Manejar la respuesta del servidor si es necesario
            console.log(response.data);
            // Asignar el valor de monto desde la respuesta del servidor
            monto = response.data.monto[0].total.toFixed(2); // Formatear a dos decimales
            if (monto === null | monto === "null"){
            monto = 0; }
            // Actualizar el texto del botón de resumen con las fechas seleccionadas
            axios
            .post("/cardCategoria", formData)
            .then(function (response) {
                // Manejar la respuesta del servidor si es necesario
                console.log(response.data);
                   // Manejar la respuesta del servidor
                        var data = response.data;
                        var cardsContainer = $('#cards');

                        // Limpiar el contenedor de tarjetas antes de agregar nuevas tarjetas
                        cardsContainer.empty();

                        // Iterar sobre los datos
                        data.target.forEach(function (categoria) {
                            // Crear un nuevo elemento div con la clase 'col-md-3'
                            var newCardCol = $('<div>').addClass('col-md-3');

                            // Crear un nuevo elemento div con la clase 'card'
                            var newCard = $('<div>').addClass('card');
                
                            // Crear un elemento div con la clase 'card-body pb-1'
                            var cardBody = $('<div>').addClass('card-body pb-1');
                
                            // Crear un elemento h5 con el nombre de la categoría y la clase 'card-title py-2'
                            var cardTitle = $('<h5>').addClass('card-title py-2').text(categoria.categoria);
                
                            var infoContainer = $('<div>');

                            // Crear un elemento div con el id 'ventas-mes' y su texto
                            var ventasMes = $('<div>').attr('id', 'ventas-mes').text("$" + categoria.suma_total.toFixed(2));
                            
                            // Crear un enlace con la clase 'detalles-link' y el texto 'Detalles'
                            var detallesLink = $('<a style="cursor:pointer;">').addClass('detalles-link').text('Detalles Compra');
                            detallesLink.css('float', 'right');

                            // Agregar un manejador de eventos 'click' al enlace
                            detallesLink.on('click', function() {
                                // Ejecutar la función para enviar la categoría al hacer clic
                                enviarCategoria(categoria.categoria);
                            });
                            
                            // Agregar 'ventasMes' y 'detallesLink' al contenedor 'infoContainer'
                            infoContainer.append(ventasMes, detallesLink);
                            
                            // Agregar el título y 'infoContainer' al div 'card-body'
                            cardBody.append(cardTitle, infoContainer);
                                            
                            // Agregar 'card-body' al div principal 'newCard'
                            newCard.append(cardBody);
                
                            // Agregar 'newCard' al div con la clase 'col-md-3'
                            newCardCol.append(newCard);
                
                            // Agregar 'newCardCol' al contenedor de tarjetas ('cardsContainer')
                            cardsContainer.append(newCardCol);
                        });

            })
            .catch(function (error) {
                // Manejar errores
                console.error(error);
            });
            updateResumenButton(startDate, endDate, monto);
        })
        .catch(function (error) {
            // Manejar errores
            console.error(error);
        });
    });

    // Cuando se cancela la selección de fechas
    $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
        // Limpiar el campo de entrada
        $(this).val('');

        // Actualizar el texto del botón de resumen con valores predeterminados o vacíos
        updateResumenButton('', '', '');
    });

    function updateResumenButton(startDate, endDate, monto) {
        // Obtener el botón de resumen
        var resumenButton = $('.btn.btn-light.mb-2');
        
        // Actualizar el texto del botón con las fechas seleccionadas

        resumenButton.html('Resumen compras desde: ' + startDate + ' hasta: ' + endDate + ' <span class="badge bg-white text-info" style="font-size: 1em;">$' + monto + '</span>');

       
    }
});
function enviarCategoria(categoria){
    console.log("Mas detalles de: ",categoria)
    $("#categoriaDetalle").text(categoria);
    let urlDataTableCat = window.location.origin + "/getCompras";
    dataTable("det_categoria", urlDataTableCat);
    $("#DetCat").modal("show");

}
