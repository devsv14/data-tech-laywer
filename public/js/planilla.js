 var eventSave = true;

document.addEventListener('DOMContentLoaded', main);
function resetForm() {
  const formInputs = document.querySelectorAll('.custom-input');
  const selectInputs = document.querySelectorAll('select');
  const radioInputs = document.querySelectorAll('.form-check-input[type="radio"]');
  const checkboxInputs = document.querySelectorAll('.form-check-input[type="checkbox"]');

  // Restablecer campos de entrada
  formInputs.forEach(input => {
    input.value = '';
  });

  // Restablecer campos select
  selectInputs.forEach(select => {
    select.value = '';
  });

  // Restablecer campos de radio
  radioInputs.forEach(radio => {
    radio.checked = false;
  });

  // Restablecer campos de checkbox
  checkboxInputs.forEach(checkbox => {
    checkbox.checked = false;
  });

  // También puedes agregar lógica adicional aquí para restablecer otros tipos de campos según sea necesario
}


/* const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
 */

function verplanillas(id, nombre) {
  $('#nombrePlanilla').text(nombre);
  $(document).ready(function () {
    let urlDataTableUsuario = window.location.origin + '/getPlanillasCreadasData/' + id;
    DataTable('t_planillac', urlDataTableUsuario);
  });
  $("#verplanillas").modal('show');
  //$("#historial_planillas").modal('hide')
  resetForm();

}


function crear_planilla(id) {
  Livewire.emit('cargarDatos', id);
  $("#CrearPlanilla").modal('show');
  resetForm();
}

function verEmpleados(id) {
  $("#VerEmpleado").modal('show');
  $(document).ready(function () {
    let urlDataTableEmple = window.location.origin + '/getPlaEmple/' + id;
    dataTable('planillaDeEmpleados', urlDataTableEmple);
  });
}

const switchElement = document.getElementById('flexSwitch');

function makeModalDraggable(modalSelector, headerSelector) {
  var modal = $(modalSelector);
  var header = modal.find(headerSelector);

  var initialX, initialY, initialModalX, initialModalY;

  header.on('mousedown', dragStart);

  $(document).on('mouseup', dragEnd);
  $(document).on('mouseleave', dragEnd);

  $(document).on('mousemove', dragModal);

  function dragStart(e) {
    if (e.button === 0) {
      initialX = e.clientX;
      initialY = e.clientY;
      initialModalX = modal.offset().left;
      initialModalY = modal.offset().top;

      modal.addClass('modal-dragging');
      e.preventDefault();
    }
  }

  function dragEnd() {
    if (modal.hasClass('modal-dragging')) {
      modal.removeClass('modal-dragging');
    }

    initialX = null;
    initialY = null;
    initialModalX = null;
    initialModalY = null;
  }

  function dragModal(e) {
    if (modal.hasClass('modal-dragging') && initialX && initialY) {
      var currentX = e.clientX;
      var currentY = e.clientY;
      var deltaX = currentX - initialX;
      var deltaY = currentY - initialY;

      var newModalX = initialModalX + deltaX;
      var newModalY = initialModalY + deltaY;

      modal.offset({
        left: newModalX,
        top: newModalY
      });
    }
  }
}

// Llamar a la función para hacer arrastrable una modal específica
$(document).ready(function () {
  makeModalDraggable("#aggPlanilla", ".modal-header");
  makeModalDraggable("#CrearPlanilla", ".modal-header");
  makeModalDraggable("#historial_planillas", ".modal-header");
  makeModalDraggable("#nueva_planilla", ".modal-header");
  makeModalDraggable("#verplanillas", ".modal-header");
  makeModalDraggable("#aggPlanilla", ".modal-header");
  makeModalDraggable("#VerEmpleado", ".modal-header");

});
function mayus(id) {
  let input = document.getElementById(id);
  input.value = input.value.toUpperCase()
}


document.addEventListener('DOMContentLoaded', () => {
  new Cleave('#dui', {
    delimiter: '-',
    blocks: [8, 1], // 8 dígitos y 1 dígito
    uppercase: true
  });
  new Cleave('#telefono', {
    delimiter: '-',
    blocks: [4, 4],
    uppercase: true
  });
  new Cleave('#telefono2', {
    delimiter: '-',
    blocks: [4, 4],
    uppercase: true
  });
  new Cleave('#nit', {
    delimiter: '-',
    blocks: [4, 6, 3, 1],
    uppercase: true
  });
  new Cleave('#nrc', {
    delimiter: '-',
    blocks: [6, 1],
    uppercase: true
  });



})

function loadImage() {
  //Codigo para vista previa de imagen
  // Obtener referencia a los elementos del DOM
  const fileInput = document.getElementById('file_logo');
  const previewImage = document.getElementById('previewImage');

  fileInput.click();

}




function CrearEmpresa() {
  $("#addEmpresa_planilla").modal('show');
}

function guardarEmpresa() {
  // Obtén los datos del formulario
  const formData = new FormData(document.getElementById('formulario_empresa'));
    const imageInput = document.getElementById('file_logo');
    if (!imageInput.files || !imageInput.files[0]) {
        Swal.fire("Favor seleccionar una imagen.");
        return;
    }
  
  if (formData.get('nombre').trim() === '') {
    document.getElementById("nombre").classList.add("error-input");
    Swal.fire("Favor llenar todos los campos!");
    return; // Detener la ejecución si hay un error
}

if (formData.get('telefono').trim() === '') {
    document.getElementById("telefono").classList.add("error-input");
    Swal.fire("Favor llenar todos los campos!");
    return; // Detener la ejecución si hay un error
}

if (formData.get('direccion').trim() === '') {
    document.getElementById("direccion").classList.add("error-input");
    Swal.fire("Favor llenar todos los campos!");
    return; // Detener la ejecución si hay un error
}

 
  // Realiza una solicitud POST al servidor utilizando Axios
  axios.post('/guardar-empresa-planilla', formData)
    .then(response => {
      //console.log(response.data);
      Swal.fire({
        icon: 'success',
        title: 'Exito',
        text: 'Empresa Creada Exitosamente',
      });
      limpiarCamposFormulario();
      $("#addEmpresa_planilla").modal('hide');
      
    })
    .catch(error => {
      console.error('Error al enviar datos:', error);
    });
}
function insertEmpleado(empresaId, nombreEmp) {
  // Lógica para registrar empleado
  //console.log(nombreEmp);
  // Establecer el valor del input oculto
  eventSave = true;

  $('#empresa_id').val(empresaId);
  $('#nameEmp').val(nombreEmp);
  // Mostrar el modal
  $("#aggPlanilla").modal('show');
  //console.log('Insertar empleado para la empresa con ID:', empresaId);
}


function saveEmpleado() {
  let Formempleado = document.getElementById('formulario_empleado');

  // Deshabilitar el botón para evitar múltiples clics
  let submitBtn = document.getElementById('submitBtn');
  submitBtn.removeEventListener('click', saveEmpleado); // Remover el evento antes de enviar

  let formData = new FormData(Formempleado);

  axios.post('/guardar-Empleado-planilla', formData)
      .then(response => {
          //console.log(response.data);

          if (response.data.message === 'Empleado guardado exitosamente') {
            // Resetear el formulario y realizar acciones necesarias
              Formempleado.reset();
              let empresaId = response.data.empresa;
              let empleadoId = response.data.empleadoId;
              let empleadoNombre = response.data.empleadoNombre;


                tabla(empresaId);
                  Swal.fire({
                    title: "Creado exitosamente",
                    text: "Deseas asociarle un usuario a este empleado!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, Asociarle usuario!"
                  }).then((result) => {
                    if (result.isConfirmed) {
                      dataTable('AsociarUsuario', window.location.origin + '/asignarUsuario');
                      $("#nombreEmpleado").val(empleadoNombre);
                      $("#idempleado").val(empleadoId);
                      $("#agregarusuario").modal('show');
                      /*  Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                      }); */
                    }
                  });
              resetearEstilosCampos();
              $("#aggPlanilla").modal('hide');
              // Resto del código...
          } else {
              // Manejar otros casos de respuesta exitosa
              manejarErrores(response.data.errors);
            }
      })
      .catch(error => {
          console.error('Error al enviar datos:', error);

          // Manejar error de validación 422
          if (error.response && error.response.status === 422) {
              manejarErrores(error.response.data.errors);
          } else {
              // Manejar otros errores
              console.error('Error inesperado:', error);
          }
      })
      .finally(() => {
          // Volver a habilitar el botón después de que se haya completado la solicitud
          submitBtn.addEventListener('click', saveEmpleado);
      });
}




function limpiarCamposFormulario() {
  // Obtener todos los campos del formulario
  let campos = document.querySelectorAll('.custom-input');
  let radios = document.querySelectorAll('input[type="radio"][name="deducciones"]');
  // Limpiar el valor de cada campo
  campos.forEach(campo => {
      campo.value = '';
  });
    // Desmarcar cada radio
    radios.forEach(radio => {
        radio.checked = false;
    });
}
function limpiarCamposFormulario2() {
  // Obtener todos los campos del formulario
  let campos = document.querySelectorAll('.custom-inpt');
  // Limpiar el valor de cada campo
  campos.forEach(campo => {
      campo.value = '';
  });

}
function manejarErrores(errors) {
  // Resetear estilos de los campos
  resetearEstilosCampos();

  // Manejar errores y establecer estilos
  for (let campo in errors) {
      document.getElementById(campo).classList.add("error-input");
      // Mostrar mensaje de error (puedes adaptar esto según tus necesidades)
      Swal.fire({
        icon: 'error',
        title: 'Campo Incompleto',
        text: errors[campo][0], // Muestra el primer mensaje de error para el campo
    });
  }
}

function resetearEstilosCampos() {
  // Resetear estilos de todos los campos
  let campos = document.querySelectorAll('.custom-input');
  campos.forEach(campo => {
      campo.classList.remove("error-input");
  });
}

//Tabla de empleados
function tabla(empresaId) {
  let idEmpresa = empresaId;
  let idTabla = 'planillaEmpresa-' + idEmpresa; 
  let idTabla2 = 'planillas-' + idEmpresa;
  let urlDataTableUsuario = window.location.origin + '/getPlanillasData/' + idEmpresa;
  let urlDataTablePlanilla = window.location.origin + '/getPlanillas/' + idEmpresa;
  dataTable(idTabla, urlDataTableUsuario);
  dataTable(idTabla2, urlDataTablePlanilla);
}

function nuevaPlanilla(empresaId, nombreEmp) {
  // Lógica para nueva planilla
  limpiarCamposFormulario2();
  $('#empresa_id').val(empresaId);
  $('#nameEmpresa').val(nombreEmp);
  $("#MCrearPlanilla").modal('show');
  idEmpresa = empresaId;
  let urldatatablePlan = window.location.origin + '/getPlanillaEmpleados/' + idEmpresa;
  dataTable('tabla_planilla', urldatatablePlan);
}

function OpenPagoModal(id, idEmpresa) {
  actualizarVista();
  limpiarCamposFormulario();
  $('#id').val(id);
  $('#empresa').val(idEmpresa);
  id_empleado = id;
  // Obtener los datos existentes desde localStorage
  let datosExistente = localStorage.getItem('datos');
  let datos;

  // Verificar si hay datos existentes
  if (datosExistente) {
    try {
      datos = JSON.parse(datosExistente);

      // Verificar si el id_empleado ya existe en el array
      let empleadoExistente = datos.find(empleado => empleado.id_empleado === id_empleado);

      if (empleadoExistente) {
        
        Swal.fire({
          title: "",
          text: 'Este empleado ya ha sido agregado.',
          icon: "error"
        });
        return; // Detener la ejecución si el empleado ya existe
      }

    } catch (error) {
      console.error('Error al parsear los datos:', error);
      // Si hay un error al parsear, iniciar con un array vacío
      datos = [];
    }
  } else {
    // Si no hay datos existentes, iniciar con un array vacío
    datos = [];
  }
  axios.post('/ver-empleado', { idempleado: id_empleado, idempresa: idEmpresa })
    .then(response => {
      $(".tableempleado tbody").empty();

      let empleadoData = response.data.empleado;
      let empreasData = response.data.empresa;
      let newRow = $("<tr>");
      newRow.append("<td class='text-center'>" + empleadoData.nombre + "</td>");
      newRow.append("<td class='text-center'>" + empreasData.nombre_empresa + "</td>");
      newRow.append("<td class='text-center'>" + empleadoData.cargo + "</td>");
      newRow.append("<td class='text-center'>" + "$" + empleadoData.salario + "</td>");
      newRow.append("<td class='text-center'>" + "$" + empleadoData.salario_quincenal + "</td>");
      newRow.append("<td class='text-center'>" + "$" + empleadoData.sueldo_diario + "</td>");
      newRow.append("<td class='text-center'>" + "$" + empleadoData.sueldo_hora + "</td>");
      // Agregar la nueva fila a la tabla
      $(".tableempleado tbody").append(newRow);

      $('#empresa').val(empreasData.id);
      $('#empleado').val(empleadoData.id);
    })
    .catch(error => {
      console.error('Error al enviar datos:', error);
      if (error.response) {
        // El servidor respondió con un código de estado diferente de 2xx
        console.error('Respuesta del servidor:', error.response.data);
        console.error('Código de estado:', error.response.status);
      } else if (error.request) {
        // La solicitud fue realizada pero no se recibió respuesta
        console.error('No se recibió respuesta del servidor');
      } else {
        // Algo sucedió al configurar la solicitud que activó un error
        console.error('Error en la configuración de la solicitud:', error.message);
      }
    });

  $("#AgregarEmpleado").modal('show');

}
function agregar() {
  // Obtener el token de Laravel
  let tokenLaravel = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  // Obtener los valores de los campos
  let diastrabajados = $('#Dtrabajados').val();
  let hextras = $('#hextras').val()|| 0;
  let bonificaciones = $('#bonificaciones').val();
  let vacaciones = $('#vacaciones').val();
  let prestamos = $('#prestamos').val();
  let llegadasTarde = $('#llegadasTarde').val();
  let diasInjustificados = $('#diasInjustificados').val();
  let otrosDescuentos = $('#Otros_descuentos').val();
  let adelantoSalarial = $('#AdelantoSalarial').val() || 0;
  let empleado = $('#empleado').val();
  let empresa = $('#empresa').val();
  // Validar que el campo "Días Trabajados" no esté vacío
  if (diastrabajados.trim() === '') {
    document.getElementById("Dtrabajados").classList.add("error-input")
    Swal.fire("Favor llenar los dias trabajados!");
    return; // Detener la ejecución si hay un error
  }
  axios.post('/obtenerdatos-planilla', {
    id_empleado: empleado,
    id_empresa: empresa,
  })
    .then(response => {
      // Manejar la respuesta exitosa
      //console.log('Datos recibidos:', response.data);

      let DatosDeEmpleado = response.data.empleadoDatos;
      let DatosDeEmpresa = response.data.empresaDatos;

      //id_planilla =
      id_empresaPlanilla = DatosDeEmpresa.id;
      nombre = DatosDeEmpleado.nombre;
      dui = DatosDeEmpleado.dui;
      fechaIngreso = DatosDeEmpleado.fecha_ingreso;
      cargo = DatosDeEmpleado.cargo;
      descuento = DatosDeEmpleado.descuento;
      //fechaDesde = 
      //fechasHasta = 
      diasTrabajados = $('#Dtrabajados').val();
      sueldoDiario = (DatosDeEmpleado.salario / 30);
      sueldoHora = ((DatosDeEmpleado.salario / 30) / 8).toFixed(2);
      sueldoBase = (DatosDeEmpleado.salario);
      sueldoQuincenalfijo = (DatosDeEmpleado.salario / 2).toFixed(2);
      sueldoQuincenalVariante = (diastrabajados * sueldoDiario);
      cantidadHoras = parseFloat($('#hextras').val()) || 0;
      horaExtra = (cantidadHoras * (sueldoHora * 2)).toFixed(2);
      bonificaciones = parseFloat($('#bonificaciones').val()) || 0;
      vacaciones = parseFloat($('#vacaciones').val()) || 0;
      prestamos = parseFloat($('#prestamos').val()) || 0 ;
      llegadasTarde = parseFloat($('#llegadasTarde').val()) || 0;
      otrosDescuentos = parseFloat($('#Otros_descuentos').val()) || 0;
      diasInjustificados = parseFloat($('#diasInjustificados').val()) || 0;

      //salario quincenal variante + ingresos extras (horas extras,bonificaciones, vacaciones)
      salarioDevengado = parseFloat(sueldoQuincenalVariante) + parseFloat(horaExtra) + parseFloat(bonificaciones) + parseFloat(vacaciones);
      // Estructura básica del if-else en JavaScript
      salario_inponible =0;
      if (descuento === 'planilla') {
                if (sueldoBase > 999){
                  isss = 15;
                } else{
                  isss = parseFloat(salarioDevengado * 0.03);
                }
        afp = parseFloat(salarioDevengado * 0.0725);
        salario_inponible = parseFloat(salarioDevengado) - parseFloat(isss) - parseFloat(afp)
        //condicional para ISR
        //NO APLICA ISR POR QUE ES MENOR DE 473.00
        if (salario_inponible < 236.0) {
          isr = 0;
        }
        //OTRA CONDICIONAL PARA VERIFICIAR SI ES MENOR DE 895.24 // TRAMO II
        else {
          if (salario_inponible < 447.62) {
            isr = (((salario_inponible - 236) * 0.1) + 8.83);
          }
          else {
            //OTRA CONDICIONAL PARA VERIFICAR SI ES MENOR DE 2038.10 //TRAMO III
            if (salario_inponible < 1019.05) {
              isr = (((salario_inponible - 447.62) * 0.2) + 30);
            }
            else {
              //OTRA CONDICIONAL PARA VERIFICAR SI ES MENOR DE 2038.10 //TRAMO IV
              if (salario_inponible > 1019.06) {
                isr = (((salario_inponible - 1019.05) * 0.3) + 144.28);
              }
              else {
                isr = 0;
              }
            }
          }

        }
      }
       else if (descuento === 'profesionales') {
          isss = 0;
          afp = 0;
          isr = (salarioDevengado * 0.1);
      } else {
        isss = 0;
        afp = 0;
        isr = 0;
      
      }

      //Total Ingresos
      total_ingresos = salarioDevengado;
      //Total Descuentos
      total_descuentos = parseFloat(isss) + parseFloat(afp) + parseFloat(isr) + parseFloat(prestamos) + parseFloat(llegadasTarde) + parseFloat(otrosDescuentos) + parseFloat(diasInjustificados);
      //Total_neto
      total_neto = (total_ingresos - total_descuentos);
        // Obtener los datos existentes desde localStorage
        let datosExistente = localStorage.getItem('datos');
        let datos;
        // Verificar si hay datos existentes
        if (datosExistente) {
          // Parsear los datos existentes desde JSON
          try {
            datos = JSON.parse(datosExistente);

            // Verificar si los datos son un array
            if (!Array.isArray(datos)) {
              throw new Error('Los datos no son un array');
            }
          } catch (error) {
            // Si hay un error al parsear o los datos no son un array, iniciar con un array vacío
            datos = [];
          }

          // Agregar el nuevo conjunto de datos
          datos.push({
     
            id_empleado: empleado,
            id_empresaPlanilla: id_empresaPlanilla,
            nombre: nombre,
            fechaIngreso: fechaIngreso,
            cargo: cargo,
            descuento: descuento,
            diasTrabajados: diasTrabajados,
            sueldoDiario: sueldoDiario,
            sueldoHora: sueldoHora,
            sueldoBase: sueldoBase,
            sueldoQuincenalfijo: sueldoQuincenalfijo,
            sueldoQuincenalVariante: sueldoQuincenalVariante,
            cantidadHoras: cantidadHoras,
            horaExtra: horaExtra,
            bonificaciones: bonificaciones,
            vacaciones: vacaciones,
            prestamos: prestamos,
            llegadasTarde: llegadasTarde,
            otrosDescuentos: otrosDescuentos,
            diasInjustificados: diasInjustificados,
            salarioDevengado: salarioDevengado.toFixed(2),
            salario_inponible: salario_inponible.toFixed(2),
            isss: isss.toFixed(2),
            afp: afp.toFixed(2),
            isr: isr.toFixed(2),
            total_ingresos: total_ingresos,
            total_descuentos: total_descuentos,
            total_neto: total_neto.toFixed(2),
            dui: dui,
            adelanto: adelantoSalarial,
            canthoras:hextras,



          });
        } else {
          // Si no hay datos existentes, iniciar con un array que contiene el nuevo conjunto de datos
          datos = [{
            id_empleado: empleado,
            id_empresaPlanilla: id_empresaPlanilla,
            nombre: nombre,
            fechaIngreso: fechaIngreso,
            cargo: cargo,
            descuento: descuento,
            diasTrabajados: diasTrabajados,
            sueldoDiario: sueldoDiario,
            sueldoHora: sueldoHora,
            sueldoBase: sueldoBase,
            sueldoQuincenalfijo: sueldoQuincenalfijo,
            sueldoQuincenalVariante: sueldoQuincenalVariante,
            cantidadHoras: cantidadHoras,
            horaExtra: horaExtra,
            bonificaciones: bonificaciones,
            vacaciones: vacaciones,
            prestamos: prestamos,
            llegadasTarde: llegadasTarde,
            otrosDescuentos: otrosDescuentos,
            diasInjustificados: diasInjustificados,
            salarioDevengado: salarioDevengado,
            salario_inponible: salario_inponible,
            isss: isss,
            afp: afp,
            isr: isr,
            total_ingresos: total_ingresos,
            total_descuentos: total_descuentos,
            total_neto: total_neto,
            dui: dui,
            adelanto: adelantoSalarial,
            canthoras:hextras,

          }];
        }
        // Almacenar los datos actualizados en localStorage
        localStorage.setItem('datos', JSON.stringify(datos));
        // Mostrar los datos en la consola (opcional)
        actualizarVista();

        $("#AgregarEmpleado").modal('hide');


    })
    .catch(error => {
      // Manejar el error
      console.error('Error en la solicitud:', error);
    });


}


// Función para actualizar la vista con los datos del localStorage
function actualizarVista() {
  // Obtener el contenedor de la tabla en la vista
  const tablaDetallesPlanilla = document.getElementById('tabla_detalles_planilla');

  // Obtener los datos existentes desde localStorage
  let datosExistente = localStorage.getItem('datos');
  let datos;

  // Verificar si hay datos existentes
  if (datosExistente) {
    // Parsear los datos existentes desde JSON
    try {
      datos = JSON.parse(datosExistente);

      // Verificar si los datos son un array
      if (!Array.isArray(datos)) {
        throw new Error('Los datos no son un array');
      }
    } catch (error) {
      // Si hay un error al parsear o los datos no son un array, iniciar con un array vacío
      datos = [];
    }

    // Limpiar la tabla antes de agregar datos
    tablaDetallesPlanilla.innerHTML = '';

    // Inicializar totales
    let totalISSS = 0;
    let totalAFP = 0;
    let totalISR = 0;
    let totalSalario = 0;
    let totalNeto = 0;

    // Recorrer los datos y agregar filas a la tabla
    datos.forEach(empleado => {
      // Crear una nueva fila
      let newRow = document.createElement('tr');

      // Agregar celdas a la fila con los datos del empleado
      newRow.innerHTML = `
        <td>${empleado.nombre}</td>
        <td>${empleado.isss}</td>
        <td>${empleado.afp}</td>
        <td>${empleado.isr}</td>
        <td>${empleado.salarioDevengado}</td>
        <td>${empleado.total_neto}</td>
        <td style='text-align:center;width:4%'><i class='nav-icon fas fa-times-circle' onClick='eliminarEmpleado("${empleado.id_empleado}");' style='color:red;cursor:pointer;font-size: 18px;'></i></td>
      `;

      // Agregar la nueva fila a la tabla
      tablaDetallesPlanilla.appendChild(newRow);

      // Actualizar totales
      totalISSS += parseFloat(empleado.isss) || 0;
      totalAFP += parseFloat(empleado.afp) || 0;
      totalISR += parseFloat(empleado.isr) || 0;
      totalSalario += parseFloat(empleado.salarioDevengado) || 0;
      totalNeto += parseFloat(empleado.total_neto) || 0;
    });

    // Actualizar totales en el pie de la tabla
    document.getElementById('total_iss').textContent = `${totalISSS.toFixed(2)}`;
    document.getElementById('total_afp').textContent = `${totalAFP.toFixed(2)}`;
    document.getElementById('total_isr').textContent = `${totalISR.toFixed(2)}`;
    document.getElementById('total_salario').textContent = `${totalSalario.toFixed(2)}`;
    document.getElementById('total_neto').textContent = `${totalNeto.toFixed(2)}`;

  } else {
    // Si no hay datos existentes, mostrar un mensaje o hacer lo que sea necesario
    console.log('No hay datos en el localStorage');
    tablaDetallesPlanilla.innerHTML = '';
    document.getElementById('total_iss').textContent = '0.00';
    document.getElementById('total_afp').textContent = '0.00';
    document.getElementById('total_isr').textContent = '0.00';
    document.getElementById('total_salario').textContent = '0.00';
    document.getElementById('total_neto').textContent = '0.00';

  }
}

function eliminarEmpleado(id_empleado) {
  // Obtener los datos existentes desde localStorage
  let datosExistente = localStorage.getItem('datos');
  let datos;

  // Verificar si hay datos existentes
  if (datosExistente) {
    // Parsear los datos existentes desde JSON
    try {
      datos = JSON.parse(datosExistente);

      // Verificar si los datos son un array
      if (!Array.isArray(datos)) {
        throw new Error('Los datos no son un array');
      }
    } catch (error) {
      // Si hay un error al parsear o los datos no son un array, iniciar con un array vacío
      datos = [];
    }

    // Encontrar la posición del empleado en el array
    const position = datos.findIndex(empleado => empleado.id_empleado === id_empleado);

    // Verificar si se encontró la posición
    if (position !== -1) {
      // Eliminar el elemento del array en la posición encontrada
      datos.splice(position, 1);

      // Almacenar los datos actualizados en localStorage
      localStorage.setItem('datos', JSON.stringify(datos));

      // Actualizar la vista después de eliminar el empleado
      actualizarVista();
    } else {
      console.log('Empleado no encontrado en el localStorage');
    }
  } else {
    console.log('No hay datos en el localStorage');
  }
}

function eliminar() {
  localStorage.clear();
}

function generarPlanilla(){
  let nombre = $('#nombre1').val().trim();
  let empresa_id = $('#empresa_id').val().trim();
  let inicio_credito = $('#inicio_credito').val().trim();
  let final_credito = $('#final_credito').val().trim();
  let total_iss = $('#total_iss').text().trim();
  let total_afp = $('#total_afp').text().trim();
  let total_isr = $('#total_isr').text().trim();
  let total_salario = $('#total_salario').text().trim();
  let total_neto = $('#total_neto').text().trim();

  if (nombre === '' || inicio_credito === '' || final_credito === '') {
    // Agregar la clase de error al campo correspondiente
    if (nombre === '') {
      document.getElementById("nombre1").classList.add("error-input");
    }
    if (inicio_credito === '') {
      document.getElementById("inicio_credito").classList.add("error-input");
    }
    if (final_credito === '') {
      document.getElementById("final_credito").classList.add("error-input");
    }
    Swal.fire({
      icon: 'error',
      title: '',
      text: 'Favor llenar todos los campos!',
    });
    return false; // Detener la ejecución si hay algún campo vacío
  }
// Obtén los datos del local storage
let datosExistente = localStorage.getItem('datos');
  
// Intenta convertir los datos a un objeto JSON
let arrayDatos = [];
try {
  arrayDatos = JSON.parse(datosExistente);
} catch (error) {
  console.error('Error al parsear los datos del local storage', error);
}
  axios.post('/guardarPlanilla', {
    nombre: nombre,
    inicio: inicio_credito,
    final: final_credito,
    isss: total_iss,
    afp: total_afp,
    isr: total_isr,
    salario: total_salario,
    total_neto: total_neto,
    empresa_id: empresa_id,
    datosEmpleado: JSON.stringify(arrayDatos), // Convierte el array a JSON y envíalo
  })
      .then(function (response) {
        console.log(response.data);
        let  idsEmpleados = response.data[2];
          // Imprimir los IDs en la consola
      // Eliminar el elemento 'datos' del localStorage
          //localStorage.removeItem('datos');
          eliminar()
          Swal.fire({
          title: "Planilla Creada exitosamente",
          text: "Deseas imprmir los comprobantes de pago",
          icon: "success",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Si, imprimir recibo!",
          

        }).then((result) => {
          if (result.isConfirmed) {
            // Extraer los IDs de empleados del response.data
            let idsEmpleados = response.data[2];
            let id_planilla =response.data[3];
            $("#MCrearPlanilla").modal('hide');
            actualizarVista();
            // Enviar los IDs de empleados a la nueva ruta
            axios.post('/Generarpdfp', { idsEmpleados: idsEmpleados, planilla_id: id_planilla }, { responseType: 'arraybuffer' })
            .then(function (response) {
              // Crear un Blob con el contenido del PDF
              const blob = new Blob([response.data], { type: 'application/pdf' });
              
              // Crear una URL para el Blob
              const url = window.URL.createObjectURL(blob);
          
              // Abrir el PDF en una nueva ventana
              window.open(url, '_blank');             

            })
            .catch(function (error) {
              console.log(error);
            });
          
            Swal.fire({
              title: "Imprimiendo!",
              text: "Tus recibos se están generando",
              icon: "success"
            });            
          }
        });
        
      })
          .catch(function (error) {
            console.log(error);
          });
}

function imprimir(id, planilla){
  let idsEmpleados = id;
  let id_planilla = planilla;

    // Enviar los IDs de empleados a la nueva ruta
    axios.post('/Generarpdfp', { idsEmpleados: idsEmpleados, planilla_id: id_planilla })
    .then(function (response) {
      // Crear un Blob con el contenido del PDF
      const blob = new Blob([response.data], { type: 'application/pdf' });
      // Crear una URL para el Blob
      const url = window.URL.createObjectURL(blob);
      // Abrir el PDF en una nueva ventana
      window.open(url, '_blank');             

    })
    .catch(function (error) {
      console.log(error);
    });
}


function asociar(){
  let id_empleado = $("#idempleado").val();
  let id_usuario = $("#idUsuario").val();

  axios.post('/actualizarid', {
      id_usuario: id_usuario,
      id_empleado: id_empleado,
  })
  .then(response => {
          //console.log(response.data);
      $('#userSeleccionado').val("");
      $("#agregarusuario").modal('hide');
      
      Swal.fire({
          title: 'Éxito',
          text: response.data.message,
          icon: 'success'
      })
      .then(() => {
      });
  })
  .catch(error => {
      //console.error('Error en axios post', error);
      Swal.fire({
          title: 'Error',
          text: 'El empleado ya tiene un usuario asignado',
          icon: 'error'
      });
  }); 
}
function AsociarUsuario(id_usuario, nombre){
  dataTable('AsociarUsuario', window.location.origin + '/asignarUsuario');
  $("#nombreEmpleado").val(nombre);
  $("#idempleado").val(id_usuario);
  $("#agregarusuario").modal('show');
}
function asociarusuario(id_usuario, nombre) {
  let id_empleado = $("#idempleado").val();
  document.getElementById("userSeleccionado").value = nombre;
  document.getElementById("idUsuario").value = id_usuario;

}