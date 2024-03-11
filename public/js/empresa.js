
$(document).ready(function () {
    let urlDataTableEmpresa = window.location.origin + "/getEmpresa";
    dataTable("empresa", urlDataTableEmpresa);
});
function newEmpresa() {
    limpiarCamposFormulario();
    $("#modalCrearEmpresa").modal("show");
}
function mayus(id) {
    var elemento = document.getElementById(id);
    elemento.value = elemento.value.toUpperCase();
}

new Cleave("#telefonoempresa", {
    delimiter: "-",
    blocks: [4, 4],
    uppercase: true,
});

new Cleave("#celularempresa", {
    delimiter: "-",
    blocks: [4, 4],
    uppercase: true,
});
new Cleave("#telefonoEm", {
    delimiter: "-",
    blocks: [4, 4],
    uppercase: true,
});

new Cleave("#celulareEm", {
    delimiter: "-",
    blocks: [4, 4],
    uppercase: true,
});
new Cleave("#telefono", {
    delimiter: "-",
    blocks: [4, 4],
    uppercase: true,
});

new Cleave("#celular", {
    delimiter: "-",
    blocks: [4, 4],
    uppercase: true,
});
new Cleave("#telefonoEdit", {
    delimiter: "-",
    blocks: [4, 4],
    uppercase: true,
});

new Cleave("#celularEdit", {
    delimiter: "-",
    blocks: [4, 4],
    uppercase: true,
});
function limpiarCamposFormulario() {
    // Obtener todos los campos del formulario
    let campos = document.querySelectorAll(".custom-input");
    // Limpiar el valor de cada campo
    campos.forEach((campo) => {
        campo.value = "";
    });
    let selectElements = document.querySelectorAll(".cls-select");
    selectElements.forEach((selectElement) => {
        selectElement.value = ""; // Establecer el valor del campo de selección a un valor vacío o predeterminado
    });
    let preview = document.getElementById('showImagePreview');
    preview.src = "";
}

function manejarErrores(errors) {
    // Manejar errores y establecer estilos
    for (let campo in errors) {
        let inputElement = document.getElementById(campo);
        inputElement.classList.add("error-input");
        // Mostrar mensaje de error (puedes adaptar esto según tus necesidades)
        Swal.fire({
            icon: "error",
            title: "Campo Incompleto",
            text: errors[campo][0], // Muestra el primer mensaje de error para el campo
        });
    }
}

function loadImage() {
    // Abre el diálogo de selección de archivos cuando se hace clic en el botón
    document.getElementById('file_logo').click();
}

function previewImage(input) {
    // Muestra la vista previa de la imagen seleccionada
    let preview = document.getElementById('showImagePreview');
    let file = input.files[0];
    let reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}


function guardarEmpresa() {
    // Obtén los datos del formulario
    let formulario = document.getElementById("FormEmpresa");
    let formData = new FormData(formulario); // Realiza la solicitud POST a tu controlador usando Axios
    axios
        .post("/guardarEmpresa", formData)
            .then(function (response) {
                // Manejar la respuesta exitosa del servidor si es necesario
                Swal.fire({
                    title: "Exito!",
                    text: "Empresa Creada Con Exito!",
                    icon: "success",
                });
                    $("#modalCrearEmpresa").modal("hide");
                    dataTable('empresa',  window.location.origin + "/getEmpresa");
                limpiarCamposFormulario();
            })
            .catch(function (error) {
                // Manejar errores
                console.error(error);
                manejarErrores(error.response.data.errors); // Cambiar a error.response
            });
}



function edit(Id_empresa) {
    // Realizar solicitud GET al servidor para obtener datos del usuario
    axios
        .get("/obtenerEmpresa/" + Id_empresa)
        .then(function (response) {
            // Manejar la respuesta exitosa del servidor
            let empresa = response.data;
            document.getElementById("idEmpresa").value = empresa.id;

            // Rellenar el formulario con los datos del usuario
            document.getElementById("nombreEm").value = empresa.nombre;
            document.getElementById("direccionEm").value = empresa.direccion;
            document.getElementById("correoEm").value = empresa.correo;
            document.getElementById("celulareEm").value = empresa.celular;
            document.getElementById("telefonoEm").value = empresa.telefono;
            document.getElementById("rubroEm").value = empresa.rubro;
/*             document.getElementById("file_logo").value = empresa.logo;
 */
            // Mostrar el modal de edición
            $("#modalEditEmpresa").modal("show");
        })
        .catch(function (error) {
            // Manejar errores
            console.error(error);
        });
}
function loadImagen() {
    // Abre el diálogo de selección de archivos cuando se hace clic en el botón
    document.getElementById('file_logos').click();
}

function previewImagen(input) {
    // Muestra la vista previa de la imagen seleccionada
    let preview = document.getElementById('showImagePreviewn');
    let file = input.files[0];
    let reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}

function EditarEmpresa() {
    // Obtén los datos del formulario
    let formulario = document.getElementById("EditEmpresa");
    let formData = new FormData(formulario); // Realiza la solicitud POST a tu controlador usando Axios
    axios
        .post("/ActualizarEmpresa", formData)
        .then(function (response) {
            // Manejar la respuesta exitosa del servidor si es necesario
            Swal.fire({
                title: "Exito!",
                text: "Usuario Creado Exitosamente!",
                icon: "success",
            });
            $("#modalEditEmpresa").modal("hide");
            dataTable('empresa',  window.location.origin + "/getEmpresa");
            limpiarCamposFormulario();
        })
        .catch(function (error) {
            // Manejar errores
            console.error(error);
            manejarErrores(error.response.data.errors); // Cambiar a error.response
        });
}
function CrearSuc(id_empresa){
    limpiarCamposFormulario();
    axios
    .get("/obtenerEmpresa/" + id_empresa)
    .then(function (response) {
        // Manejar la respuesta exitosa del servidor
        let empresa = response.data;
        let id = response.data.id;
        console.log(id);
        // Rellenar el formulario con los datos del usuario
        document.getElementById("idEmpresaS").value = empresa.id;
        document.getElementById("nombreEmpresaSpan").innerText = empresa.nombre;
        let urlDataTableSucursales = window.location.origin + "/getSucursales/" + id;
        dataTable("Sucursales", urlDataTableSucursales);
        $("#modalAgregarSucursal").modal("show");
    })
    .catch(function (error) {
        // Manejar errores
        console.error(error);
    });
    
}

function save_sucursal(){
  // Obtén los datos del formulario
  let formulario = document.getElementById("CrearSuc");
  let formData = new FormData(formulario); // Realiza la solicitud POST a tu controlador usando Axios
  axios
      .post("/CrearSucursal", formData)
      .then(function (response) {
            let id = response.data.id;
            console.log(id);
          // Manejar la respuesta exitosa del servidor si es necesario
          Swal.fire({
              title: "Exito!",
              text: "Sucursal Creada Exitosamente!",
              icon: "success",
          });
          dataTable('Sucursales',  window.location.origin + "/getSucursales/" + id);
          limpiarCamposFormulario();
      })
      .catch(function (error) {
          // Manejar errores
          console.error(error);
          manejarErrores(error.response.data.errors); // Cambiar a error.response
      });
}

function editSuc(id_suc){
    limpiarCamposFormulario();
    axios
    .get("/obtenerSucursal/" + id_suc)
        .then(function (response) {
            // Manejar la respuesta exitosa del servidor
            console.log(response.data)
            let sucursal = response.data;
            // Rellenar el formulario con los datos del usuario
            document.getElementById("id_suc").value = sucursal.id;
            document.getElementById("id_emp").value = sucursal.empresa_id;
            document.getElementById("nombreEdit").value = sucursal.nombre_sucursal;
            document.getElementById("direccionEdit").value = sucursal.direccion;
            document.getElementById("telefonoEdit").value = sucursal.telefono;
            document.getElementById("celularEdit").value = sucursal.celular;
            document.getElementById("encargadoEdit").value = sucursal.encargado;

            $("#modalEditSucursal").modal("show");
        })
        .catch(function (error) {
            // Manejar errores
            console.error(error);
        });
    
}
function edit_sucursal(){
    let formulario = document.getElementById("EditSuc");
    let formData = new FormData(formulario); 
    axios
        .post("/ActualizarSucursal", formData)
        .then(function (response) {
            // Manejar la respuesta exitosa del servidor si es necesario
                console.log(response.data);
                let idemp = response.data.id;

            Swal.fire({
                title: "Exito!",
                text: "Sucursal Actualizada Exitosamente!",
                icon: "success",
            });
            let urlDataTableSucursales = window.location.origin + "/getSucursales/" + idemp;
            dataTable("Sucursales", urlDataTableSucursales);
            $("#modalEditSucursal").modal("hide");
            limpiarCamposFormulario();
        })
        .catch(function (error) {
            // Manejar errores
            console.error(error);
            manejarErrores(error.response.data.errors); // Cambiar a error.response
        });
}

