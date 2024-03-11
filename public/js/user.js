function newUsuario() {
    limpiarCamposFormulario();
    $("#ModalAgregarUser").modal("show");
}
function mayus(id) {
    let elemento = document.getElementById(id);
    elemento.value = elemento.value.toUpperCase();
}

new Cleave("#telefono", {
    delimiter: "-",
    blocks: [4, 4],
    uppercase: true,
});
new Cleave("#dui", {
    delimiter: "-",
    blocks: [8, 1],
    uppercase: true,
});
new Cleave("#telefonoEd", {
    delimiter: "-",
    blocks: [4, 4],
    uppercase: true,
});
new Cleave("#duiEd", {
    delimiter: "-",
    blocks: [8, 1],
    uppercase: true,
});
//Envio de formulario de creacion de usuario a controlador
function guardarUsuario() {
    // Obtén los datos del formulario
    let formulario = document.getElementById("userForm");
    let formData = new FormData(formulario); // Realiza la solicitud POST a tu controlador usando Axios
    axios
        .post("/guardarUser", formData)
        .then(function (response) {
            // Manejar la respuesta exitosa del servidor si es necesario
            Swal.fire({
                title: "Exito!",
                text: "Usuario Creado Exitosamente!",
                icon: "success",
            });
            $("#ModalAgregarUser").modal("hide");
            dataTable('Usuario',  window.location.origin + "/getUsuarios");
            limpiarCamposFormulario();
        })
        .catch(function (error) {
            // Manejar errores
            console.error(error);
            manejarErrores(error.response.data.errors); // Cambiar a error.response
        });
}

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

$(document).ready(function () {
    let urlDataTableUsuario = window.location.origin + "/getUsuarios";
    dataTable("Usuario", urlDataTableUsuario);
});

function edit(Id_usuario) {
    // Realizar solicitud GET al servidor para obtener datos del usuario
    axios
        .get("/obtenerUsuario/" + Id_usuario)
        .then(function (response) {
            // Manejar la respuesta exitosa del servidor
            let usuario = response.data;
            document.getElementById("idUsuario").value = usuario.id;

            // Rellenar el formulario con los datos del usuario
            document.getElementById("nombreEd").value = usuario.name;
            document.getElementById("telefonoEd").value = usuario.telefono;
            document.getElementById("duiEd").value = usuario.dui;
            document.getElementById("cargoEd").value = usuario.cargo;
            document.getElementById("correoEd").value = usuario.correo;
            document.getElementById("usuarioEd").value = usuario.usuario;
            document.getElementById("contraseñaEd").value = ""; // Puedes decidir si mostrar o no la contraseña
            document.getElementById("estadoEd").value = usuario.estado;

            // Mostrar el modal de edición
            $("#ModalEditUser").modal("show");
        })
        .catch(function (error) {
            // Manejar errores
            console.error(error);
        });
}
function EditarUsuario() {
    // Obtén los datos del formulario
    let formulario = document.getElementById("userFormEd");
    let formData = new FormData(formulario); // Realiza la solicitud POST a tu controlador usando Axios
    axios
        .post("/ActualizarUser", formData)
        .then(function (response) {
            // Manejar la respuesta exitosa del servidor si es necesario
            Swal.fire({
                title: "Exito!",
                text: "Usuario Creado Exitosamente!",
                icon: "success",
            });
            $("#ModalEditUser").modal("hide");
            dataTable('Usuario',  window.location.origin + "/getUsuarios");
            limpiarCamposFormulario();
        })
        .catch(function (error) {
            // Manejar errores
            console.error(error);
            manejarErrores(error.response.data.errors); // Cambiar a error.response
        });
}
