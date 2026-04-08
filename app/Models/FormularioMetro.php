<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormularioMetro extends Model
{
    protected $table = 'formulario_metro';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'razones_diligenciamiento',
        'tipo_documento',
        'numero_documento',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'nombres_apellidos_civica',
        'genero',
        'cual',
        'viaprincipal',
        'numero',
        'prefijo1',
        'nombrevia',
        'viasecundaria',
        'prefijo2',
        'cuadrante',
        'placa',
        'complemento',
        'municipio_residencia',
        'comuna_corregimiento',
        'barrio',
        'fecha_nacimiento',
        'estrato_socioeconomico',
        'sisben',
        'celular',
        'nivel_academico',
        'grado',
        'semestre',
        'numero_civica',
        'presenta_discapacidad',
        'tipo_discapacidad',
        'beneficio_sapiencia',
        'doc_identidad',
        'publicos',
        'civica',
        'discapacidad',
    ];                                                           

}