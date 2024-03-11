@extends('layouts.app')
@section('title', 'Empresa')
@section('content')
@include('empresa.modals.modalCrearEmpresa')
@include('empresa.modals.modalEditEmpresa')
@include('empresa.modals.modalAgregarSucursal')
@include('empresa.modals.modalEditSucursal')
<main class="main">

  <div class="pagetitle">
    <h1 style="text-align: center;">MODULO DE EMPRESA</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Empresa</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Empresa</h5>

            <!-- En tu vista -->
            @can('categoria-user')
            <button class="btn btn-primary mb-4" onclick="newEmpresa()">
              <i class="bi bi-person-plus"></i> Nuevo Empresa
            </button>
            @endcan

            <!-- Table with stripped rows -->
            <table class="table-custom table-responsive table-hover table-bordered" style="width:100%" id="empresa">
              <thead class="bg-dark text-light">
                <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Logo</th>
                  <th class="text-center">Direccion</th>
                  <th class="text-center">Celular</th>
                  <th class=text-center">Correo</th>
                  <th class="text-center">Telefono</th>
                  <th class="text-center">Rubro</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody class="text-center">
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
<script src="{{ asset('js/empresa.js') }}?v={{ rand() }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush