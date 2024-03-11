<script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
<script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
<script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
<script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
{{-- <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script> --}}
<script src="{{asset('assets/js/fontawesome.all.min.js')}}"></script>
<!-- Template Main JS File -->
<script  src="{{asset('assets/jquery-37.min.js')}}"></script>
{{-- Datatable --}}
<script src="{{asset('assets/datatable/datatables.min.js')}}"></script>
<script src="{{asset('assets/datatable/pdfmake.min.js')}}"></script>
<script src="{{asset('js/config/datatable.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('js/helpers/drag.js')}}"></script>
<script  src="{{asset('assets/axios.min.js')}}"></script>
<script  src="{{asset('assets/sweetAlert/sweetalert2.all.min.js')}}"></script>
<script  src="{{asset('assets/selectize2.0/js/selectize.min.js')}}"></script>
<script  src="{{asset('assets/js/cleave.js')}}"></script>
<script  src="{{asset('assets/datepicker/moment.min.js')}}"></script>
<script  src="{{asset('assets/datepicker/daterangepicker.min.js')}}"></script>


<script>

  const Toast = Swal.mixin({
  toast: true,
  position: "center",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});

var unidades_medida = [
    {"value": "Metro", "text": "Metro"},
    {"value": "Yarda", "text": "Yarda"},
    {"value": "Vara", "text": "Vara"},
    {"value": "Pie", "text": "Pie"},
    {"value": "Pulgada", "text": "Pulgada"},
    {"value": "Milímetro", "text": "Milímetro"},
    {"value": "Milla cuadrada", "text": "Milla cuadrada"},
    {"value": "Kilómetro cuadrado", "text": "Kilómetro cuadrado"},
    {"value": "Hectárea", "text": "Hectárea"},
    {"value": "Manzana", "text": "Manzana"},
    {"value": "Acre", "text": "Acre"},
    {"value": "Metro cuadrado", "text": "Metro cuadrado"},
    {"value": "Yarda cuadrada", "text": "Yarda cuadrada"},
    {"value": "Vara cuadrada", "text": "Vara cuadrada"},
    {"value": "Pie cuadrado", "text": "Pie cuadrado"},
    {"value": "Pulgada cuadrada", "text": "Pulgada cuadrada"},
    {"value": "Metro cúbico", "text": "Metro cúbico"},
    {"value": "Yarda cúbica", "text": "Yarda cúbica"},
    {"value": "Barril", "text": "Barril"},
    {"value": "Pie cúbico", "text": "Pie cúbico"},
    {"value": "Galón", "text": "Galón"},
    {"value": "Litro", "text": "Litro"},
    {"value": "Botella", "text": "Botella"},
    {"value": "Pulgada cúbica", "text": "Pulgada cúbica"},
    {"value": "Mililitro", "text": "Mililitro"},
    {"value": "Onza fluida", "text": "Onza fluida"},
    {"value": "Tonelada métrica", "text": "Tonelada métrica"},
    {"value": "Tonelada", "text": "Tonelada"},
    {"value": "Quintal métrico", "text": "Quintal métrico"},
    {"value": "Quintal", "text": "Quintal"},
    {"value": "Arroba", "text": "Arroba"},
    {"value": "Kilogramo", "text": "Kilogramo"},
    {"value": "Libra troy", "text": "Libra troy"},
    {"value": "Libra", "text": "Libra"},
    {"value": "Onza troy", "text": "Onza troy"},
    {"value": "Onza", "text": "Onza"},
    {"value": "Gramo", "text": "Gramo"},
    {"value": "Miligramo", "text": "Miligramo"},
    {"value": "Megawatt", "text": "Megawatt"},
    {"value": "Kilowatt", "text": "Kilowatt"},
    {"value": "Watt", "text": "Watt"},
    {"value": "Megavoltio-amperio", "text": "Megavoltio-amperio"},
    {"value": "Kilovoltio-amperio", "text": "Kilovoltio-amperio"},
    {"value": "Voltio-amperio", "text": "Voltio-amperio"},
    {"value": "Gigawatt-hora", "text": "Gigawatt-hora"},
    {"value": "Megawatt-hora", "text": "Megawatt-hora"},
    {"value": "Kilowatt-hora", "text": "Kilowatt-hora"},
    {"value": "Watt-hora", "text": "Watt-hora"},
    {"value": "Kilovoltio", "text": "Kilovoltio"},
    {"value": "Voltio", "text": "Voltio"},
    {"value": "Millar", "text": "Millar"},
    {"value": "Medio millar", "text": "Medio millar"},
    {"value": "Ciento", "text": "Ciento"},
    {"value": "Docena", "text": "Docena"},
    {"value": "Unidad", "text": "Unidad"},
    {"value": "Otra", "text": "Otra"}
];

function validarCampos(classInput,classSelect) {
    let inputs = document.querySelectorAll(classInput); 
    let selects =   document.querySelectorAll(classSelect);
    
    ////validar inputs    
        for (let input of inputs) {                         
            if (input.value.trim() === '') {        
                let inputId = input.id;                      
                let label = document.querySelector(`label[for="${inputId}"]`).textContent;            
                Toast.fire({icon: "error",title: label + " no puede ser un campo vacio"});
                return false; // Indicar que hay campos vacíos
            }    
        } 
            // Validar selects
        for (let select of selects) {                         
            if (select.value == '0') {        
                let selectId = select.id;                      
                let label = document.querySelector(`label[for="${selectId}"]`).textContent;            
                Toast.fire({icon: "error",title: "Debe seleccionar una opción válida para " + label});
                return false; // Indicar que hay campos vacíos
            }    
        } 
        
        return true; // Indicar que no hay campos vacíos
}


function limpiarFormulario(formularioId) {
    const formulario = document.getElementById(formularioId);
    
    // Limpiar inputs
    const inputs = formulario.querySelectorAll('input');
    inputs.forEach(input => {
        input.value = '';
    });

    // Limpiar selects
    const selects = formulario.querySelectorAll('select');
    selects.forEach(select => {
        select.selectedIndex = 0;
    });
}
</script>
