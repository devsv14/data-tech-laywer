@extends('layouts.app')

@section('title', 'Compras')

@section('content')
@include('compras.modals.crear_compra')
@include('productos.modals.nuevoProducto')
@include('compras.modals.add_categoria_compra')
@include('compras.modals.modal_confirm_compra')
@include('compras.modals.modal_detalleCompra')
@include('compras.modals.modal_agregarImg')

<main class="main">
  <div class="pagetitle">
    <h1 style="text-align: center;">MODULO DE COMPRAS</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Compras</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Compras</h5>

            <!-- En tu vista -->
            <button id="openModalEnvLab" class="btn btn-outline-primary mb-3"  data-bs-toggle="modal" data-bs-target="#new-compra"><i class="fas fa-plus"></i>
              Crear compra </button>
            

            <!-- Table with stripped rows -->
            <table class="table-custom table-responsive table-hover table-bordered" style="width:100%" id="compras">
              <thead class="bg-dark text-light">
                <tr>
                  <th class="text-center">Id</th>
                  <th class="text-center">Tipo Comprobante</th>
                  <th class="text-center"># Compra</th>
                  <th class="text-center">Tienda/Vendedor</th>
                  <th class="text-center">Monto</th>
                  <th class="text-center">Comprobante</th>
                  <th class="text-center">Acciones</th>
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
  </section>
</main><!-- End #main -->


@endsection

@push('js')
    <script src="{{ asset('js/compras.js') }}?v={{ rand() }}"></script>
    <script src="{{ asset('js/productos.js') }}?v={{ rand() }}"></script>
    <script>
    var categorias = $("#cat-item-compra").selectize();

    var medidas = $("#unidad-medida-compra").selectize();
    for (var i = 0; i < unidades_medida.length; i++) {
      medidas[0].selectize.addOption(unidades_medida[i]);
    }
      medidas[0].selectize.refreshItems();

    </script>
@endpush