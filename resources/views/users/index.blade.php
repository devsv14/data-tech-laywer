@extends('layouts.app')
@section('title', 'Usuarios')
@section('content')
@include('users.modals.modalAgregarUser')
@include('users.modals.modalEditUser')


<main class="main">

    <div class="pagetitle">
      <h1 style="text-align: center;">MODULO DE USUARIOS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Usuarios</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Usuarios</h5>
              <button class="btn btn-primary mb-4" onclick="newUsuario()" ><i  class="bi bi-person-plus"></i> Nuevo Usuario</button>
              <!-- Table with stripped rows -->
              <table class="table-custom table-responsive table-hover table-bordered" style="width:100%"
              id="Usuario">
              <thead class="bg-dark text-light">
                      <tr>
                          <th class="text-center">ID</th>
                          <th class="text-center">Nombre</th>
                          <th class="text-center">Usuario</th>
                          <th class="text-center">Cargo</th>
                          <th class="text-center">Estado</th>
                          <th class="text-center">Dui</th>
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

 <script src="{{ asset('js/user.js') }}?v={{ rand() }}"></script>  
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush