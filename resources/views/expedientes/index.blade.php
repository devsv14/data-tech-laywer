
@extends('layouts.app')

@section('title', 'Expedientes')

@section('content')
@include('expedientes.modals.new_expediente')
<main class="main">
  <div class="pagetitle">
    <h1 style="text-align: center;">EXPEDIENTES</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Reporteria expedientes</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Expedientes</h5>

            <!-- En tu vista -->
            <button id="openModalEnvLab" class="btn btn-outline-success mb-3"  data-bs-toggle="modal" data-bs-target="#new-expediente-modal"><i class="fas fa-plus"></i>
              Crear Expediente</button>
            

            <!-- Table with stripped rows -->
            <table class="table-custom table-responsive table-hover table-bordered" style="width:100%" id="compras">
              <!-- <thead class="bg-dark text-light">
                <tr>
                  <th class="text-center">Id</th>
                  <th class="text-center">Tipo Comprobante</th>
                  <th class="text-center"># Compra</th>
                  <th class="text-center">Tienda/Vendedor</th>
                  <th class="text-center">Monto</th>
                  <th class="text-center">Comprobante</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead> -->
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
    <script src="{{ asset('js/expedientes.js') }}?v={{ rand() }}"></script> 
@endpush