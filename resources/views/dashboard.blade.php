@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<style>
    .workspace { display: flex; gap: 0; height: calc(100vh - 120px); overflow: hidden; }

    /* Panel izquierdo */
    .panel-tabla { display: flex; flex-direction: column; width: 55%; min-width: 400px; border-right: 2px solid #dee2e6; background: #fff; }
    .panel-tabla-header { background: #0a2240; color: #fff; padding: 14px 20px; display: flex; justify-content: space-between; align-items: center; flex-shrink: 0; border-bottom: 3px solid #e8a014; }
    .panel-tabla-header h5 { margin: 0; font-size: 15px; }
    .tabla-wrap { overflow-y: auto; flex: 1; padding: 12px; }

    /* Botones acción tabla */
    .btn-editar-panel { background: #0a2240; color: #fff; border: none; font-size: 11px; padding: 4px 12px; border-radius: 4px; cursor: pointer; white-space: nowrap; }
    .btn-editar-panel:hover { background: #1a4a7a; color: #fff; }
    tbody tr.selected { background: #e6f0fb !important; }

    /* Panel derecho */
    .panel-form { flex: 1; display: flex; flex-direction: column; background: #f5f3ee; overflow: hidden; }
    .panel-form-header { background: #e8a014; color: #0a2240; padding: 14px 20px; font-size: 14px; font-weight: 600; flex-shrink: 0; display: flex; justify-content: space-between; align-items: center; }
    .panel-form-body { overflow-y: auto; flex: 1; padding: 20px 24px; }

    /* Estado vacío */
    .empty-state { display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%; color: #8a9ab0; text-align: center; padding: 40px; }

    /* Formulario */
    .section-title { font-size: 10px; font-weight: 700; letter-spacing: .15em; text-transform: uppercase; color: #e8a014; border-bottom: 1px solid #ddd; padding-bottom: 6px; margin: 18px 0 12px; }
    .field-label { font-size: 11px; font-weight: 600; letter-spacing: .07em; text-transform: uppercase; color: #4a6080; margin-bottom: 4px; display: block; }
    .panel-form .form-control, .panel-form .form-select { font-size: 13px; margin-bottom: 12px; }
    .btn-save { background: #0a2240; color: #fff; border: none; padding: 10px 28px; font-size: 13px; font-weight: 600; border-radius: 6px; cursor: pointer; }
    .btn-save:hover { background: #1a4a7a; }
</style>
@endpush

@section('content')
<div class="container-fluid px-3 py-3">

    {{-- Botones superiores --}}
    <div class="d-flex gap-2 mb-3">
        <button id="btnExport" class="btn btn-success btn-sm">⬇ Descargar Excel</button>
        <button id="btnImport" class="btn btn-primary btn-sm">📎 Adjuntar tabla</button>
        <input type="file" id="fileInput" class="d-none" accept=".csv,.xls,.xlsx">
    </div>

    {{-- Workspace dos paneles --}}
    <div class="workspace border rounded overflow-hidden">

        {{-- PANEL IZQUIERDO: Tabla --}}
        <div class="panel-tabla">
            <div class="panel-tabla-header">
                <h5>Registros ({{ $formularios->count() }})</h5>
            </div>
            <div class="tabla-wrap">
                <table id="tablaDatos" class="table table-striped table-bordered table-sm" style="font-size:12px; width:100%;">
                    <thead>
                        <tr>
                            <th>Tipo Doc.</th>
                            <th>Número Doc.</th>
                            <th>Nombre en Cívica</th>
                            <th>Género</th>
                            <th>Municipio</th>
                            <th>Comuna</th>
                            <th>Barrio</th>
                            <th>Fecha Nac.</th>
                            <th>Celular</th>
                            <th>Nivel Ac.</th>
                            <th>Discapacidad</th>
                            <th>Beneficio</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($formularios as $formulario)
                        <tr id="fila-{{ $formulario->id }}">
                            <td>{{ $formulario->tipo_documento }}</td>
                            <td>{{ $formulario->numero_documento }}</td>
                            <td>{{ $formulario->nombres_apellidos_civica }}</td>
                            <td>{{ $formulario->genero }}</td>
                            <td>{{ $formulario->municipio_residencia }}</td>
                            <td>{{ $formulario->comuna_corregimiento }}</td>
                            <td>{{ $formulario->barrio }}</td>
                            <td>{{ $formulario->fecha_nacimiento }}</td>
                            <td>{{ $formulario->celular }}</td>
                            <td>{{ $formulario->nivel_academico }}</td>
                            <td>{{ $formulario->presenta_discapacidad }}</td>
                            <td>{{ $formulario->beneficio_sapiencia }}</td>
                            <td>
                                <button class="btn-editar-panel"
                                    onclick="cargarFormulario({{ $formulario->toJson() }}, this)">
                                    ✏ Editar
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- PANEL DERECHO: Formulario edición --}}
        <div class="panel-form">
            <div class="panel-form-header">
                <span id="form-titulo">Selecciona un registro para editar</span>
                <span id="form-id" style="font-size:12px; opacity:.7;"></span>
            </div>
            <div class="panel-form-body">

                {{-- Estado vacío --}}
                <div class="empty-state" id="empty-state">
                    <svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="opacity:.4; margin-bottom:16px;">
                        <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <p>Haz clic en <strong>Editar</strong> en cualquier fila<br>para ver y modificar el formulario completo aquí.</p>
                </div>

                {{-- Formulario edición --}}
                <form method="POST" id="formEditar" style="display:none;">
                    @csrf @method('PUT')

                    <div class="section-title">Razón de diligenciamiento</div>
                    <label class="field-label">¿Por qué va a diligenciar el formulario?</label>
                    <select name="razones_diligenciamiento" id="e_razones" class="form-select">
                        <option value="">Seleccionar</option>
                        <option value="Solicitar Beneficio">Solicitar Beneficio</option>
                        <option value="Actualizar información">Actualizar información</option>
                    </select>

                    <div class="section-title">Identificación</div>
                    <div class="row g-2">
                        <div class="col-6">
                            <label class="field-label">Tipo de documento</label>
                            <select name="tipo_documento" id="e_tipo_doc" class="form-select">
                                <option value="">Seleccionar</option>
                                <option>CC</option><option>TI</option><option>RC</option>
                                <option>PPT</option><option>NES</option><option>NUIP</option>
                                <option>PAP</option><option>PED</option><option>CE</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="field-label">Número de documento</label>
                            <input type="text" name="numero_documento" id="e_num_doc" class="form-control">
                        </div>
                    </div>

                    <div class="section-title">Datos personales</div>
                    <div class="row g-2">
                        <div class="col-6">
                            <label class="field-label">Primer nombre</label>
                            <input type="text" name="primer_nombre" id="e_p_nombre" class="form-control">
                        </div>
                        <div class="col-6">
                            <label class="field-label">Segundo nombre</label>
                            <input type="text" name="segundo_nombre" id="e_s_nombre" class="form-control">
                        </div>
                        <div class="col-6">
                            <label class="field-label">Primer apellido</label>
                            <input type="text" name="primer_apellido" id="e_p_apellido" class="form-control">
                        </div>
                        <div class="col-6">
                            <label class="field-label">Segundo apellido</label>
                            <input type="text" name="segundo_apellido" id="e_s_apellido" class="form-control">
                        </div>
                    </div>

                    <label class="field-label mt-2">Nombres y apellidos (como está en la cívica)</label>
                    <input type="text" name="nombres_apellidos_civica" id="e_civica_nombre" class="form-control">

                    <div class="row g-2">
                        <div class="col-6">
                            <label class="field-label">Género</label>
                            <select name="genero" id="e_genero" class="form-select">
                                <option value="">Seleccionar</option>
                                <option>MASCULINO</option><option>FEMENINO</option><option>OTRAS</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="field-label">¿Cuál?</label>
                            <input type="text" name="cual" id="e_cual" class="form-control">
                        </div>
                    </div>

                    <div class="section-title">Dirección de residencia</div>
                    <div class="row g-2">
                        <div class="col-4">
                            <label class="field-label">Vía principal</label>
                            <select name="viaprincipal" id="e_via" class="form-select">
                                <option value="">Seleccionar</option>
                                <option>AUTOPISTA</option><option>AVENIDA</option><option>AVENIDA CALLE</option>
                                <option>AVENIDA CARRERA</option><option>BULEVAR</option><option>CALLE</option>
                                <option>CARRERA</option><option>CIRCUNVALAR</option><option>DIAGONAL</option>
                                <option>KILOMETRO</option><option>OTRA</option><option>PASAJE</option>
                                <option>PASEO</option><option>PEATONAL</option><option>TRANSVERSAL</option>
                                <option>TRONCAL</option><option>VARIANTE</option><option>VIA</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label class="field-label">Número</label>
                            <input type="number" name="numero" id="e_numero" class="form-control">
                        </div>
                        <div class="col-4">
                            <label class="field-label">Prefijo 1</label>
                            <input type="text" name="prefijo1" id="e_prefijo1" class="form-control">
                        </div>
                        <div class="col-4">
                            <label class="field-label">Nombre vía</label>
                            <select name="nombrevia" id="e_nombrevia" class="form-select">
                                <option value="">Seleccionar</option>
                                <option>BIS</option><option>ESTE</option><option>NORTE</option><option>OESTE</option><option>SUR</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label class="field-label">Vía secundaria</label>
                            <input type="number" name="viasecundaria" id="e_viasec" class="form-control">
                        </div>
                        <div class="col-4">
                            <label class="field-label">Prefijo 2</label>
                            <input type="text" name="prefijo2" id="e_prefijo2" class="form-control">
                        </div>
                        <div class="col-4">
                            <label class="field-label">Cuadrante</label>
                            <select name="cuadrante" id="e_cuadrante" class="form-select">
                                <option value="">Seleccionar</option>
                                <option>BIS</option><option>ESTE</option><option>NORTE</option><option>OESTE</option><option>SUR</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label class="field-label">Placa</label>
                            <input type="number" name="placa" id="e_placa" class="form-control">
                        </div>
                        <div class="col-4">
                            <label class="field-label">Complemento</label>
                            <input type="text" name="complemento" id="e_complemento" class="form-control">
                        </div>
                    </div>

                    <div class="row g-2 mt-1">
                        <div class="col-4">
                            <label class="field-label">Municipio</label>
                            <select name="municipio_residencia" id="e_municipio" class="form-select">
                                <option value="">Seleccionar</option>
                                <option>BARBOSA</option><option>BELLO</option><option>CALDAS</option>
                                <option>COPACABANA</option><option>ENVIGADO</option><option>ITAGÜI</option>
                                <option>LA_ESTRELLA</option><option>MEDELLÍN</option><option>SABANETA</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label class="field-label">Comuna</label>
                            <input type="text" name="comuna_corregimiento" id="e_comuna" class="form-control">
                        </div>
                        <div class="col-4">
                            <label class="field-label">Barrio</label>
                            <input type="text" name="barrio" id="e_barrio" class="form-control">
                        </div>
                    </div>

                    <div class="section-title">Datos relevantes</div>
                    <div class="row g-2">
                        <div class="col-4">
                            <label class="field-label">Fecha de nacimiento</label>
                            <input type="date" name="fecha_nacimiento" id="e_fecha" class="form-control">
                        </div>
                        <div class="col-4">
                            <label class="field-label">Estrato</label>
                            <select name="estrato_socioeconomico" id="e_estrato" class="form-select">
                                <option value="">Seleccionar</option>
                                <option>1</option><option>2</option><option>3</option>
                                <option>4</option><option>5</option><option>6</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label class="field-label">SISBEN</label>
                            <select name="sisben" id="e_sisben" class="form-select">
                                <option value="">Seleccionar</option>
                                <option>A</option><option>B</option><option>C</option>
                                <option>D</option><option value="No_tiene">No tiene</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label class="field-label">Celular</label>
                            <input type="tel" name="celular" id="e_celular" class="form-control">
                        </div>
                    </div>

                    <div class="section-title">Información académica</div>
                    <div class="row g-2">
                        <div class="col-4">
                            <label class="field-label">Nivel académico</label>
                            <select name="nivel_academico" id="e_nivel" class="form-select">
                                <option value="">Seleccionar</option>
                                <option>PRIMARIA</option><option>SECUNDARIA</option>
                                <option>MEDIA</option><option>SUPERIOR</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label class="field-label">Grado</label>
                            <input type="text" name="grado" id="e_grado" class="form-control">
                        </div>
                        <div class="col-4">
                            <label class="field-label">Semestre</label>
                            <select name="semestre" id="e_semestre" class="form-select">
                                <option value="">Seleccionar</option>
                                @for($i=1; $i<=10; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="section-title">Tarjeta cívica y discapacidad</div>
                    <div class="row g-2">
                        <div class="col-4">
                            <label class="field-label">Número de cívica</label>
                            <input type="text" name="numero_civica" id="e_civica" class="form-control">
                        </div>
                        <div class="col-4">
                            <label class="field-label">¿Presenta discapacidad?</label>
                            <select name="presenta_discapacidad" id="e_discapacidad" class="form-select">
                                <option value="">Seleccionar</option>
                                <option>SI</option><option>NO</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label class="field-label">Tipo de discapacidad</label>
                            <select name="tipo_discapacidad" id="e_tipo_disc" class="form-select">
                                <option value="">Seleccionar</option>
                                <option>FÍSICA</option><option>SENSORIAL</option>
                                <option>INTELECTUAL</option><option>PSIQUICA</option><option>MULTIPLE</option>
                            </select>
                        </div>
                    </div>

                    <div class="section-title">Beneficio Sapiencia</div>
                    <label class="field-label">¿Qué beneficio tiene activo con Sapiencia?</label>
                    <select name="beneficio_sapiencia" id="e_sapiencia" class="form-select">
                        <option value="">Seleccionar</option>
                        <option>VISION4RIOS</option><option>MATRICULA_CERO</option>
                        <option>FONDOS_PREGRADO</option><option>FONDOS_POSGRADO</option>
                        <option>MEJORES_BACHILLERES</option><option>MEJORES DEPORTISTAS</option>
                        <option>@MEDELLÍN</option><option>BILINGÜISMO</option>
                    </select>

                    <div class="d-flex justify-content-end gap-2 mt-4 mb-3">
                        <button type="button" class="btn btn-outline-secondary btn-sm"
                            onclick="cerrarFormulario()">Cancelar</button>
                        <button type="submit" class="btn-save">💾 Guardar cambios</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
<script>
$(document).ready(function() {
    $('#tablaDatos').DataTable({
        scrollX: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });
});

function cargarFormulario(d, btn) {
    // Marcar fila seleccionada
    document.querySelectorAll('tbody tr').forEach(r => r.classList.remove('selected'));
    btn.closest('tr').classList.add('selected');

    // Header
    document.getElementById('form-titulo').textContent =
        (d.primer_nombre ?? '') + ' ' + (d.primer_apellido ?? '');
    document.getElementById('form-id').textContent = 'ID #' + d.id;

    // Acción del form
    document.getElementById('formEditar').action = '/formularios/' + d.id;

    // Rellenar campos
    const set = (id, val) => { const el = document.getElementById(id); if (el) el.value = val ?? ''; };

    set('e_razones',       d.razones_diligenciamiento);
    set('e_tipo_doc',      d.tipo_documento);
    set('e_num_doc',       d.numero_documento);
    set('e_p_nombre',      d.primer_nombre);
    set('e_s_nombre',      d.segundo_nombre);
    set('e_p_apellido',    d.primer_apellido);
    set('e_s_apellido',    d.segundo_apellido);
    set('e_civica_nombre', d.nombres_apellidos_civica);
    set('e_genero',        d.genero);
    set('e_cual',          d.cual);
    set('e_via',           d.viaprincipal);
    set('e_numero',        d.numero);
    set('e_prefijo1',      d.prefijo1);
    set('e_nombrevia',     d.nombrevia);
    set('e_viasec',        d.viasecundaria);
    set('e_prefijo2',      d.prefijo2);
    set('e_cuadrante',     d.cuadrante);
    set('e_placa',         d.placa);
    set('e_complemento',   d.complemento);
    set('e_municipio',     d.municipio_residencia);
    set('e_comuna',        d.comuna_corregimiento);
    set('e_barrio',        d.barrio);
    set('e_fecha',         d.fecha_nacimiento);
    set('e_estrato',       d.estrato_socioeconomico);
    set('e_sisben',        d.sisben);
    set('e_celular',       d.celular);
    set('e_nivel',         d.nivel_academico);
    set('e_grado',         d.grado);
    set('e_semestre',      d.semestre);
    set('e_civica',        d.numero_civica);
    set('e_discapacidad',  d.presenta_discapacidad);
    set('e_tipo_disc',     d.tipo_discapacidad);
    set('e_sapiencia',     d.beneficio_sapiencia);

    // Mostrar formulario
    document.getElementById('empty-state').style.display = 'none';
    document.getElementById('formEditar').style.display = 'block';
}

function cerrarFormulario() {
    document.getElementById('empty-state').style.display = 'flex';
    document.getElementById('formEditar').style.display = 'none';
    document.getElementById('form-titulo').textContent = 'Selecciona un registro para editar';
    document.getElementById('form-id').textContent = '';
    document.querySelectorAll('tbody tr').forEach(r => r.classList.remove('selected'));
}
</script>
@endpush