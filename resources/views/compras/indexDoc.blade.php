@extends('layouts.app')

@section('title', 'DOC.COMPRAS')

@section('content')
@include('compras.modals.crear_compra')
@include('productos.modals.nuevoProducto')
@include('compras.modals.add_categoria_compra')
@include('compras.modals.modal_confirm_compra')
@include('compras.modals.modal_detalleCompra')
@include('compras.modals.modal_agregarImg')
@include('compras.modals.modal_detCategoria')

<main class="main">
  <div class="pagetitle">
    <h1 style="text-align: center;">DOCUMENTACION COMPRAS</h1>
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
            <h5 class="card-title">Det. Compras</h5>

            <!-- En tu vista -->
            <div class="row">

            <div class="col-md-3">
              <input type="text" class="form-control" name="datefilter" value="" />
            </div>
            
            <div class="col-md-6">
              <button type="button" class="btn btn-light mb-2">
                Resumen compras desde: hasta: <span class="badge bg-white text-info" style="font-size: 1em;">$0.00</span>
              </button>
            </div>
            </div>
            <hr>

            <!-- Table with stripped rows -->
        <div class="row" id="cards">
          
        
    </div>


        </div>

          </div>
          
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->


@endsection

@push('js')
    <script src="{{ asset('js/compras.js') }}?v={{ rand() }}"></script>
@endpush