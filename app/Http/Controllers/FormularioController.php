<?php

namespace App\Http\Controllers;

use App\Models\FormularioMetro; 
use Illuminate\Http\Request;

class FormularioController extends Controller
{
    public function edit($id)
    {
        $formulario = FormularioMetro::findOrFail($id);
        return view('welcome', compact('formulario'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'doc_identidad' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'publicos' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'civica' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'discapacidad' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'terminos' => 'accepted',
        ]);

        $ruta1 = null;
        $ruta2 = null;
        $ruta3 = null;
        $ruta4 = null;

        if ($request->hasFile('doc_identidad')) {
            $ruta1 = $request->file('doc_identidad')->store('documentos', 'public');
        }

        if ($request->hasFile('publicos')) {
            $ruta2 = $request->file('publicos')->store('documentos', 'public');
        }

        if ($request->hasFile('civica')) {
            $ruta3 = $request->file('civica')->store('documentos', 'public');
        }

        if ($request->hasFile('discapacidad')) {
            $ruta4 = $request->file('discapacidad')->store('documentos', 'public');
        }

        FormularioMetro::create([

        'razones_diligenciamiento' => $request->razones_diligenciamiento,
            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento,
            'primer_nombre' => $request->primer_nombre,
            'segundo_nombre' => $request->segundo_nombre,
            'primer_apellido' => $request->primer_apellido,
            'segundo_apellido' => $request->segundo_apellido,
            'nombres_apellidos_civica' => $request->nombres_apellidos_civica,
            'genero' => $request->genero,
            'cual' => $request->cual,
            'viaprincipal' => $request->viaprincipal,
            'numero' => $request->numero,
            'prefijo1' => $request->prefijo1,
            'nombrevia' => $request->nombrevia,
            'viasecundaria' => $request->viasecundaria,
            'prefijo2' => $request->prefijo2,
            'cuadrante' => $request->cuadrante,
            'placa' => $request->placa,
            'complemento' => $request->complemento,
            'municipio_residencia' => $request->municipio_residencia,
            'comuna_corregimiento' => $request->comuna_corregimiento,
            'barrio' => $request->barrio,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'estrato_socioeconomico' => $request->estrato_socioeconomico,
            'sisben' => $request->sisben,
            'celular' => $request->celular,
            'nivel_academico' => $request->nivel_academico,
            'grado' => $request->grado,
            'semestre' => $request->semestre,
            'numero_civica' => $request->numero_civica,
            'presenta_discapacidad' => $request->presenta_discapacidad,
            'tipo_discapacidad' => $request->tipo_discapacidad,
            'beneficio_sapiencia' => $request->beneficio_sapiencia,

'doc_identidad' => $ruta1,
'publicos' => $ruta2,
'civica' => $ruta3,
'discapacidad' => $ruta4,
        ]);

        return redirect()->back()->with('success', 'Formulario guardado correctamente');}
}

