@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Registros del Formulario Metro</h2>
    <div class="row mb-3">
        <div class="mb-3">
    <button id="btnExport" class="btn btn-success">
        Descargar tabla en Excel
    </button>
</div>
<div class="mb-3">
    <button id="btnImport" class="btn btn-primary">
    Adjuntar tabla</button><input type="file" id="fileInput" class="d-none" accept=".csv,.xls,.xlsx">
</div>
</div>
    <table id="tablaDatos" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Razones del diligenciamiento</th>
                <th>Tipo documento</th>
                <th>Número documento</th>
                <th>Primer nombre</th>
                <th>Segundo nombre</th>
                <th>Primer apellido</th>
                <th>Segundo apellido</th>
                <th>Nombre y Apellidos en la Civica</th>
                <th>Genero</th>
                <th>Cual</th>
                <th>Vía principal</th>
                <th>Número</th>
                <th>Prefijo</th>
                <th>Nombre vía</th>
                <th>Vía secundaria</th>
                <th>Prefijo</th>
                <th>Cuadrante</th>
                <th>Placa</th>
                <th>Complemento</th>
                <th>Municipio de residencia</th>
                <th>Comuna o corregimiento</th>
                <th>Barrio</th>
                <th>Fecha de nacimiento</th>
                <th>Estrato socieconómico</th>
                <th>Sisben</th>
                <th>Celular</th>
                <th>Nivel académico</th>
                <th>Grado</th>
                <th>Semestre</th>
                <th>Número cívica</th>
                <th>Presenta discapacidad</th>
                <th>Tipo discapacidad</th>
                <th>Beneficio sapiencia</th>
                <th>Documento identidad</th>
                <th>Servicios Públicos</th>
                <th>Tarjeta civica</th>
                <th>Certificado de discapacidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formularios as $formulario)
                <tr>
                    <td>{{ $formulario->razones_diligenciamiento }}</td>
                    <td>{{ $formulario->tipo_documento }}</td>
                    <td>{{ $formulario->numero_documento }}</td>
                    <td>{{ $formulario->primer_nombre }}</td>
                    <td>{{ $formulario->segundo_nombre }}</td>
                    <td>{{ $formulario->primer_apellido }}</td>
                    <td>{{ $formulario->segundo_apellido }}</td>
                    <td>{{ $formulario->nombres_apellidos_civica }}</td>
                    <td>{{ $formulario->genero }}</td>
                    <td>{{ $formulario->cual }}</td>
                    <td>{{ $formulario->viaprincipal }}</td>
                    <td>{{ $formulario->numero }}</td>
                    <td>{{ $formulario->prefijo1 }}</td>
                    <td>{{ $formulario->nombrevia }}</td>
                    <td>{{ $formulario->viasecundaria }}</td>
                    <td>{{ $formulario->prefijo2 }}</td>
                    <td>{{ $formulario->cuadrante }}</td>
                    <td>{{ $formulario->placa }}</td>
                    <td>{{ $formulario->complemento }}</td>
                    <td>{{ $formulario->municipio_residencia }}</td>
                    <td>{{ $formulario->comuna_corregimiento }}</td>
                    <td>{{ $formulario->barrio }}</td>
                    <td>{{ $formulario->fecha_nacimiento }}</td>
                    <td>{{ $formulario->estrato_socioeconomico }}</td>
                    <td>{{ $formulario->sisben }}</td>
                    <td>{{ $formulario->celular }}</td>
                    <td>{{ $formulario->nivel_academico }}</td>
                    <td>{{ $formulario->grado }}</td>
                    <td>{{ $formulario->semestre }}</td>
                    <td>{{ $formulario->numero_civica }}</td>
                    <td>{{ $formulario->presenta_discapacidad }}</td>
                    <td>{{ $formulario->tipo_discapacidad }}</td>
                    <td>{{ $formulario->beneficio_sapiencia }}</td>
                    <td>{{ $formulario->doc_identidad }}</td>
                    <td>{{ $formulario->publicos }}</td>
                    <td>{{ $formulario->civica }}</td>
                    <td>{{ $formulario->discapacidad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
@endpush
