@extends('layouts.app')
@section('title', 'Planillas')
@section('page-title', 'MÓDULO DE PLANILLAS')
@section('content')
{{-- @include('suscripcion.modal_suscripcion') --}}
@include('planilla.modalAddEmpresa')
@include('planilla.modalAddEmpleado')
@include('planilla.modalCrearPlanilla')
@include('planilla.modalAggEmpleado')
@include('planilla.modalVerEmpleados')
@include('planilla.modalAsociarUsuario')
<div class="content-wrapper">
    <div class="content-wrapper">
        <div class="card-header p-0 m-0">
            <div class="content-wrapper">
                <div class="card" style="border-top:4px solid #012970">
                    <div class="card card-warning card-outline mt-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Planillas de Empleados</h5>
                                <button class="btn btn-outline-primary btn-sm btn-inline mx-1"
                                    onclick="CrearEmpresa()">Crear Empresa</button>
                                <div class="row">
                                    <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                                        @foreach($empresas as $empresa)
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link @if($loop->first) active @endif"
                                                id="empresa-tab-{{ $empresa->id }}" data-bs-toggle="tab"
                                                data-bs-target="#empresa-content-{{ $empresa->id }}" type="button"
                                                role="tab" aria-controls="empresa-{{ $empresa->id }}"
                                                aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                                                data-idempresa="{{ $empresa->id }}" onclick="tabla({{ $empresa->id }})"
                                                data-id="{{ $empresa->id }}">
                                                {{ $empresa->nombre_empresa }}
                                            </button>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content pt-2" id="borderedTabContent">
                                        <!-- Default Tabs -->
                                        <!-- Default Tabs -->
                                        <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                                            <li class="nav-item flex-fill" role="presentation">
                                                <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab"
                                                    data-bs-target="#home-justified" type="button" role="tab"
                                                    aria-controls="home" aria-selected="true"
                                                    style="background-color: #ffffff">Planillas</button>
                                            </li>
                                            <li class="nav-item flex-fill" role="presentation">
                                                <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab"
                                                    data-bs-target="#profile-justified" type="button" role="tab"
                                                    aria-controls="profile" aria-selected="false">Empleados</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content pt-2" id="myTabjustifiedContent">
                                            @foreach($empresas as $empresa)
                                            <div class="tab-pane fade show active" id="home-justified" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="tab-pane fade @if($loop->first) show active @endif"
                                                    id="empresa-content-{{ $empresa->id }}" role="tabpanel"
                                                    aria-labelledby="empresa-tab-{{ $empresa->id }}">
                                                    <div class="card p-2">
                                                        <section class="section">

                                                            <p
                                                                style="text-align: center; font-size: 18px; border-top:4px solid #ffffff">
                                                                Planillas Realizadas</p>
                                                            <div class="buttons mb-2 d-flex"
                                                                style="justify-content: flex-start;">
                                                                <button
                                                                    class="btn btn-outline-primary btn-sm btn-inline mx-1"
                                                                    onclick="nuevaPlanilla({{ $empresa->id }}, '{{ $empresa->nombre_empresa }}')"
                                                                    data-id="{{ $empresa->id }}">Nueva Planilla</button>
                                                            </div>
                                                            <table
                                                                class="table-responsive table-hover table-bordered table1 table-custom table-td"
                                                                style="width:100%" id="planillas-{{ $empresa->id }}">
                                                                <thead class="bg-dark text-light">
                                                                    <tr>
                                                                        <th class="text-center">Nombre</th>
                                                                        <th class="text-center">Desde</th>
                                                                        <th class="text-center">Hasta</th>
                                                                        <th class="text-center">Isss</th>
                                                                        <th class="text-center">Afp</th>
                                                                        <th class="text-center">Isr</th>
                                                                        <th class="text-center">Total salario</th>
                                                                        <th class="text-center">Total neto</th>
                                                                        <th class="text-center">Imprimir</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="text-center">
                                                                    <!-- Contenido de la tabla -->
                                                                </tbody>
                                                            </table>
                                                        </section>
                                                        <!-- Contenido específico de la empresa -->
                                                        <!-- Puedes mostrar aquí los detalles de cada empresa -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="profile-justified" role="tabpanel"
                                                aria-labelledby="profile-tab">
                                                <p
                                                    style="text-align: center; font-size: 18px; border-top:4px solid #ffffff">
                                                    Empleados</p>
                                                <div class="buttons mb-2 d-flex">
                                                    <button class="btn btn-outline-primary btn-sm btn-inline mx-1"
                                                        onclick="insertEmpleado({{ $empresa->id }}, '{{ $empresa->nombre_empresa }}')"
                                                        data-id="{{ $empresa->id }}">Registrar
                                                        Empleado</button>
                                                </div>
                                                <table
                                                    class="table-responsive table-hover table-bordered table1 table-custom table-td"
                                                    style="width:100%" id="planillaEmpresa-{{ $empresa->id }}">
                                                    <thead class="bg-dark text-light">
                                                        <tr>
                                                            <th class="text-center">ID</th>
                                                            <th class="text-center">Nombre</th>
                                                            <th class="text-center">Cargo</th>
                                                            <th class="text-center">Fecha Inicio</th>
                                                            <th class="text-center">S/Mensual</th>
                                                            <th class="text-center">Asociar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                        <!-- Contenido de la tabla -->
                                                    </tbody>
                                                </table>
                                            </div>
                                            @endforeach
                                        </div><!-- End Default Tabs -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')

<script src="{{ asset('js/planilla.js')}}?v={{rand()}}"></script>
@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
@endpush
@endsection